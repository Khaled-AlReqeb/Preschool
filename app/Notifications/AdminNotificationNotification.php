<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $content;
    public $message;
    public $title;
    public $icon;
    public $channels;

    public $via = [];

    public function __construct($message,$title,$icon,$channels)
    {
        $this->message = $message;
        $this->title = $title;
        $this->icon = $icon;
        $this->channels = $channels;
        
        $this->content = [
            'title' => $this->title,
            'details' => $this->message,
            'icon' => 'https://al3dal.com/icon.png',
            'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
            'others' => [
            ]
        ];
        foreach($channels as $channel){
            if($channel == 'firebase'){
                array_push($this->via,FcmChannel::class);
            }
            if($channel == 'email'){
                array_push($this->via,'mail');
            }
            if($channel == 'whatsapp'){
                //add whatsapp channel
                array_push($this->via,'');
            }
            if($channel == 'sms'){
                //add sms channel
                array_push($this->via,'');
            }
        }
         
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject($this->title)
        ->view('emails.admin_notification',['content' => $this->message,'title'=>$this->title]);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $notifiable->setLanguage();
        return $this->content;
    }
    public function toFcm($notifiable)
    {
       /*  $optionBuilder = new \LaravelFCM\Message\OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 60 * 24 * 20);

        $notificationBuilder = new \LaravelFCM\Message\PayloadNotificationBuilder(app()->getLocale() == 'ar' ? $this->content['title']['ar_message'] : $this->content['title']['en_message']);
        $notificationBuilder->setBody($this->content['details'])
            ->setSound('default');

        $dataBuilder = new \LaravelFCM\Message\PayloadDataBuilder();
        if (isset($this->content['others'])){
            $this->content['others']['role_id'] = $notifiable->role_id;
            $dataBuilder->addData($this->content['others']);
        }

        if (isset($this->content['click_action']))
            $notificationBuilder->setClickAction($this->content['click_action']);

        if (isset($this->content['icon']))
            $notificationBuilder->setIcon($this->content['icon']);


        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $topic_name = (string)'user_' . $notifiable->id ;
        $topic = new Topics();
        $topic->topic($topic_name);

        FCM::sendToTopic($topic, $option, $notification, $data); */
    }
}
