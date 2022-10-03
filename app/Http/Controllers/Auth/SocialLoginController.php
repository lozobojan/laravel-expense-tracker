<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function initGitHubLogin(){
        return Socialite::driver('github')->redirect();
    }

    public function gitHubLoginCallback(){
        $user = Socialite::driver('github')->user();
        return $this->loginSocialUser($user);
    }

    public function initGoogleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback(){
        $user = Socialite::driver('google')->user();
        return $this->loginSocialUser($user);
    }

    public function loginSocialUser($user){
        $userExists = User::query()->where('email', $user->getEmail())->count() > 0;

        $existingUser = User::query()->firstOrCreate([
            'email' => $user->getEmail()
        ], [
            'name' => $user->getName(),
            'password' => Hash::make(Str::random(10)),
        ]);

        if(!$userExists){
            // send welcome mail
            $existingUser->notify(new NewUserNotification($existingUser));
        }

        Auth::login($existingUser, true);
        return redirect()->route('home');
    }
}
