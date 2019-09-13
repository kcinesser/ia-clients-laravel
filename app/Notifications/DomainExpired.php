<?php

namespace App\Notifications;

use App\HostedDomain;
use App\RemoteDomain;
use App\Mail\DomainExpired as ExpiredEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Log;

class DomainExpired extends Notification implements ShouldQueue
{
    use Queueable;
    
    /**
     * The Remote Domain instance.
     *
     * @var RemoteDomain
     */
    public $remoteDomain;
    
    /**
     * The Hosted Domain instance correlating to the remote domain.
     *
     * @var HostedDomain
     */
    public $hostedDomain;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RemoteDomain $remoteDomain, HostedDomain $hostedDomain)
    {
        $this->remoteDomain = $remoteDomain;
        $this->hostedDomain = $hostedDomain;       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new ExpiredEmail($this->remoteDomain, $this->hostedDomain))
                ->to($this->hostedDomain->client->accountManager);
    }
    
    /**
     * Get the slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        $message = ":ghost: Domain Expired: The domain {$this->remoteDomain->domain} belonging to {$this->hostedDomain->client->name} has expired.";
        $message .= " {$this->hostedDomain->client->accountManager->name} has been sent an email with details.";
        
        return (new SlackMessage)->to('#ia-clients-test')->content($message);
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
