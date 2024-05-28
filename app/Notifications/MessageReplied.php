<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageReplied extends Notification
{
    use Queueable;

    protected $replyMessage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($replyMessage)
    {
        $this->replyMessage = $replyMessage;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Message Has Been Replied')
            ->line('You have received a new reply to your message.')
            ->line('Reply:')
            ->line($this->replyMessage)
            ->line('Thank you for getting in touch with us!');
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
