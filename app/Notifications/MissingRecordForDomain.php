<?php

namespace App\Notifications;

use App\HostedDomain;
use App\RemoteDomain;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Log;

class MissingRecordForDomain extends Notification implements ShouldQueue
{
    use Queueable;
    
    /**
     * The Remote Domain instance.
     *
     * @var RemoteDomain
     */
    public $remoteDomain;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RemoteDomain $remoteDomain)
    {
        $this->remoteDomain = $remoteDomain; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //
    }
    
    /**
     * Get the slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {        
        $message = ":heavy_exclamation_mark: Domain Notification Error: The Interactive Clients App attempted to send a notification";
        $message .= " regarding the domain {$this->remoteDomain->domain}, but could not locate the related HostedDomain record.";
        $message .= " Notifications were not sent, manual intervention is required.";
        
        return (new SlackMessage)->to(config('services.slack.dev_alert_channel'))->content($message);
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
            //
        ];
    }
}
