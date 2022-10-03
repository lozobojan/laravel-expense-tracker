<?php

namespace App\Listeners;

use App\Events\NewExpenseAddedEvent;
use App\Notifications\NewExpenseNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUserForExpense
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewExpenseAddedEvent  $event
     * @return void
     */
    public function handle(NewExpenseAddedEvent $event)
    {
        $event->user->notify(new NewExpenseNotification($event->expense));
    }
}
