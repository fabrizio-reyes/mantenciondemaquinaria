<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SolicitudEnviada extends Notification
{
    use Queueable;

    protected $solicitud;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($solicitud)
    {
        $this->solicitud=$solicitud;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
    . $this->solicitud->user->name
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        if(auth()->user()->centrodesalud_codigo == $this->solicitud->user->centrodesalud_codigo){
                    return [
            'link' => route('solicitudes.show', $this->solicitud->codigo),
            'text' => "Solicitud de Mantención de " .$this->solicitud->user->name
        ];

        }

    }
}
