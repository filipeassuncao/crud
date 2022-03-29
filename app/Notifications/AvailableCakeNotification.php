<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AvailableCakeNotification extends Notification  implements ShouldQueue
{
    use Queueable;

    protected $cake;
    /**
     * Criação de nova instância
     *
     * @return void
     */
    public function __construct($cake)
    {
        $this->cake = $cake;
    }

    /**
     * Canal a ser enviado.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Email de bolo disponível.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('Ola!')
        ->line("Seu $this->cake->name já está disponível, volte ao aplicativo e compre o seu produto")
        ->subject('TESTE BACKEND - Todos os direitos reservados.');
    }
}
