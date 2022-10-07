<?php

namespace App\Services;

use App\Models\User;

class UserCleanupService
{
    public function doCleanup(int $olderThan = 30){
        return User::query()->whereNull('email_verified_at')
            ->where('created_at', '<=', now()->subDays($olderThan))
            ->delete();
    }
}
