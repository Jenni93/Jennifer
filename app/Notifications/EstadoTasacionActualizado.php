<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstadoTasacionActualizado extends Notification
{
    use Queueable;

    protected $tasacion;
    protected $nuevoEstado;
    //protected $emailContacto;

    /**
     * Create a new notification instance.
     */
    public function __construct($tasacion, $nuevoEstado, $emailContacto)
    {
        $this->tasacion = $tasacion;
        $this->nuevoEstado = $nuevoEstado;
        //$this->emailContacto = $emailContacto;
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
            ->subject('Actualización en el estado de su Tasación')
            ->greeting('Hola,')
            ->line('El estado de su solicitud de tasación de la calle ' .$this->tasacion->direccion.' ha cambiado.')
            ->line('Nuevo estado es: ' . $this->nuevoEstado)
            ->salutation('Saludos, el equipo de Trioteca');
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
