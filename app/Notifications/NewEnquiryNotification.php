<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEnquiryNotification extends Notification
{
    use Queueable;

    protected $enquiry;

    /**
     * Create a new notification instance.
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
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
                    ->subject('New Contact Enquiry: ' . $this->enquiry->subject)
                    ->greeting('Hello!')
                    ->line('You have received a new contact form submission.')
                    ->line('From: ' . $this->enquiry->name . ' (' . $this->enquiry->email . ')')
                    ->line('Subject: ' . $this->enquiry->subject)
                    ->line('Message:')
                    ->line($this->enquiry->message)
                    ->action('View Enquiries', url('/admin/enquiries'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->enquiry->id,
            'name' => $this->enquiry->name,
            'email' => $this->enquiry->email,
            'subject' => $this->enquiry->subject,
        ];
    }
}
