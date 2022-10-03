<?php

namespace App\Listeners;

use App\Events\NewExpenseAddedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewExpenseAddedListener
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
        // ...
    }
}
