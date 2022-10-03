<?php

namespace App\Notifications;

use App\Mail\NewExpenseMail;
use App\Models\Expense;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewExpenseNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public Expense $expense)
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function getExpenseSum($notifiable){
        return Expense::query()
            ->withoutGlobalScope('mine')
            ->where('user_id', $notifiable->id)->sum('amount');
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NewExpenseMail
     */
    public function toMail($notifiable)
    {
        $sum = $this->getExpenseSum($notifiable);
        return (new NewExpenseMail($this->expense, $sum))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


}
