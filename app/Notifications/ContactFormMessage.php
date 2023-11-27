<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Http\Requests\ContactFormRequest;

class ContactFormMessage extends Notification
{
    protected $message;

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(contactFormRequest $message)
    {
        $this->message = $message;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Web Inquiry from '.$this->message->name)
        ->greeting("New Web Inquiry")
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->line('Name: '. $this->message->name)
        ->line('Phone: '. $this->message->phone ?? 'N/A')
        ->line('Email: '. $this->message->email ?? 'N/A')
        ->line('Comment: ')
        ->line($this->message->comment)
        ->salutation("");
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
