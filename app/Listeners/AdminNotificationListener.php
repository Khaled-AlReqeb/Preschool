<?php

namespace App\Listeners;

use App\Model\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\AdminNotificationNotification;

class AdminNotificationListener
{

    public function handle($event)
    {
        if ($event->user_type == 'individual' ){
            $users = User::query()->whereIn('id',$event->users)->where('status','active')->get();
            if($users->count())
                Notification::send($users, new AdminNotificationNotification($event->message,$event->title,$event->icon,$event->channels));
        }
        elseif($event->user_type == 'group' ){
            $users = User::query()->whereIn('role_id',$event->users)->where('status','active')->get();
            if($users->count())
                Notification::send($users, new AdminNotificationNotification($event->message,$event->title,$event->icon,$event->channels));
        }
    }
}
