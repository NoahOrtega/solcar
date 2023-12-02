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
        ->view('mail-form.office', [
            'name' => $this->message->name,
            'phone' => $this->message->phone ?? 'N/A',
            'email' => $this->message->email ?? 'N/A',
            'comment' => $this->message->comment,
        ])
        ->subject('Web Inquiry from '.$this->message->name)
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
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
