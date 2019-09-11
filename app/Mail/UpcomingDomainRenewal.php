<?php

namespace App\Mail;

use App\RemoteDomain;
use App\HostedDomain;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpcomingDomainRenewal extends Mailable
{
    use Queueable, SerializesModels;
    
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
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.domain_notices.upcoming_domain_renewal');
    }
}
