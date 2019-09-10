<?php

namespace App\Mail;

use App\RemoteDomain;
use App\HostedDomain;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DomainRenewingInThirtyDays extends Mailable
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
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RemoteDomain $remoteDomain, HostedDomain $hostedDomain)
    {
        $this->remoteDomain = $remoteDomain;
        $this->hostedDomain = $hostedDomain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.domain_notices.domain_renewing_in_thirty_days');
    }
}
