<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;
    public $icon;
    public $message;
    public $channels;
    public $user_type;
    public $users;

    public function __construct( $title,$icon,$message, $user_type ,$channels,$users)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->message = $message;
        $this->channels = $channels;
        $this->user_type = $user_type;
        $this->users = $users;
    }
}
