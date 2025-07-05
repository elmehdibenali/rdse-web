<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Consultation;
use Carbon\Carbon;

class ConsultationScheduled extends Notification
{
    use Queueable;

    public $consultation;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre consultation a été programmée')
            ->greeting('Bonjour ' . $notifiable->firstname .' '. $notifiable->lastname . ',')
            ->line('Votre consultation a été programmée pour le :')
            ->line( Carbon::parse($this->consultation->proposed_datetime)->format('d/m/Y à H:i'))
            ->line('Merci de confirmer si ce créneau vous convient.')
            ->action('Voir votre consultation', url('/user/consultation'))
            ->salutation('Cordialement, l\'équipe');
    }
}
