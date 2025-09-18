<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification
{
    use Queueable;

    protected $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre code OTP de réinitialisation')
            ->line('Voici votre code de vérification : **' . $this->otp . '**')
            ->line('⚠️ Ce code est valable uniquement pendant 2 minutes.')
            ->line('Si vous n’avez pas demandé cette réinitialisation, ignorez cet email.');
    }
}
