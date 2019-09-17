<?php

namespace App\Notifications;

use App\HostedDomain;
use App\RemoteDomain;
use App\Mail\UpcomingDomainExpiration as ExpirationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Log;

class UpcomingDomainExpiration extends Notification implements ShouldQueue
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
     * The number of days until the domain will renew.
     *
     * @var integer
     */
    public $daysOut;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RemoteDomain $remoteDomain, HostedDomain $hostedDomain, int $daysOut)
    {
        $this->remoteDomain = $remoteDomain;
        $this->hostedDomain = $hostedDomain;
        $this->daysOut = $daysOut;       
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
        return (new ExpirationEmail($this->remoteDomain, $this->hostedDomain, $this->daysOut))
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
        $message = ":spiral_calendar_pad: Expiration Notice: The domain {$this->remoteDomain->domain} belonging to {$this->hostedDomain->client->name} is set to expire in {$this->daysOut} days.";
        $message .= " {$this->hostedDomain->client->accountManager->name} has been sent an email with details.";
        
        return (new SlackMessage)->to(config('services.slack.accounts_alert_channel'))->content($message);
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
