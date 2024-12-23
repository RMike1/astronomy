<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminSubscribeNotification extends Notification implements ShouldQueue
{
    use Queueable;


    public $messageAdmin;
    public $link;
    /**
     * Create a new notification instance.
     */
    public function __construct($messageAdmin, $link)
    {
        $this->messageAdmin=$messageAdmin;
        $this->link=$link;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New User Has Subscribed')
                    ->view('emails.subscriber',[
                        'message_admin'=>$this->messageAdmin,
                        'link'=>$this->link,
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
