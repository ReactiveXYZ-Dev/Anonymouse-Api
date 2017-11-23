<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use App\Notifications\PushNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPushNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // notification data
    public $user, $title, $body, $contentAvailable = null;

    /**
     * Create a new job instance.
     * @param App\User $user Target user to send
     * @return void
     */
    public function __construct(
        User $recipient, $title, $body, $contentAvailable = null
    )
    {
        $this->user = $recipient;
        $this->title = $title;
        $this->body = $body;
        $this->contentAvailable = $contentAvailable;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notification = new PushNotification(
            $this->title, $this->body, $this->contentAvailable
        );

        $this->user->notify($notification);
    }
}
