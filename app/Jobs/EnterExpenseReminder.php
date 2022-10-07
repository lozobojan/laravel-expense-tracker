<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\EnterExpenseReminderNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EnterExpenseReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $inactiveUsers = User::query()->whereDoesntHave('expenses', function($query){
            $query->where('created_at', now()->format('Y-m-d'));
        })->get();

        foreach ($inactiveUsers as $user) {
            $user->notify(new EnterExpenseReminderNotification());
        }
    }
}
