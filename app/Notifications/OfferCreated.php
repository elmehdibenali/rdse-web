<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Offer;

class OfferCreated extends Notification
{
    use Queueable;

    public $offer;

    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle offre disponible')
            ->greeting('Bonjour ' . $notifiable->firstname . ',')
            ->line('Une nouvelle offre a été ajoutée suite à votre consultation.')
            // ->action('Télécharger l\'offre', route('offers.download', $this->offer->id))
            ->action('Voir Votre Offre', route('user.offers.index'))
            ->line('Merci pour votre confiance.');
    }
}
