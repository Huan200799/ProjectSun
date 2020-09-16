<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderApproval extends Notification
{
    use Queueable;

    public function __construct()
    {
    //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mailadmin = config('constraint.mail.admin');
        $name = config('constraint.mail.name');
        return (new MailMessage)
            ->subject(trans('message.adminorder'))
            ->from($mailadmin, $name)
            ->greeting(trans('message.timeorder'))
            ->line(trans('message.vaocheck'))
            ->action(trans('message.check'), url('http://127.0.0.1:8000/admin/order'))
            ->line(trans('message.good'));
    }

    public function toArray($notifiable)
    {
        return [
          //
        ];
    }
}
