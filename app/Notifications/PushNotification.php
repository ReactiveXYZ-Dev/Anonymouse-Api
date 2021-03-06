<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Apn\{ApnChannel, ApnMessage};

class PushNotification extends Notification
{
    // notification data
    private $title, $body, $contentAvailable = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $body, $contentAvailable = null)
    {
        $this->title = $title;
        $this->body = $body;
        $this->contentAvailable = $contentAvailable;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ ApnChannel::class ];
    }

    /**
     * Get the APN representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NotificationChannels\Apn\ApnMessage;
     */
    public function toApn($notifiable)
    {
        return ApnMessage::create()
                    ->badge(1)
                    ->title($this->title)
                    ->body($this->body)
                    ->contentAvailable($this->contentAvailable);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
