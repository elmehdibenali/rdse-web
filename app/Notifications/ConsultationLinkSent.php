<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Consultation;
use Carbon\Carbon;

class ConsultationLinkSent extends Notification
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
            ->subject('Lien de votre consultation en ligne')
            ->greeting('Bonjour ' . $notifiable->firstname .' '. $notifiable->lastname . ',')
            ->line('Le lien de votre consultation a été mis à jour.')
            ->line('Date prévue : ' . Carbon::parse($this->consultation->proposed_datetime)->format('d/m/Y à H:i'))
            ->action('Accéder à la consultation', $this->consultation->consultation_link)
            ->line('Veuillez vous connecter à l\'heure prévue.')
            ->salutation('Cordialement, l\'équipe');
    }
}
