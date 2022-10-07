<?php

namespace App\Console\Commands;

use App\Services\UserCleanupService;
use Illuminate\Console\Command;

class UserCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete non-verified users older than 30 days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(UserCleanupService $userCleanupService)
    {
        $userCleanupService->doCleanup(10);
        return 0;
    }
}
