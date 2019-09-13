@extends('layouts.notification_email')

@section('title')
	Renewal notice: {{ $remoteDomain->domain }}
@endsection

@section('headline')
	<span style="display: block">{{ $remoteDomain->domain }}</span> has renewed.
@endsection

@section('content')
<!-- Main content section. Main is a useful landmark element. -->
<main>
    <!-- This div is purely presentational, providing a container for the message. -->
    <div style="background-color: #f3f2ef; border-radius: 4px; padding: 24px 48px;">
        <!-- This ghost table is used solely for padding in Word-based Outlook clients. -->
        <!--[if (gte mso 9)|(IE)]>
        <table cellspacing="0" cellpadding="0" border="0" width="720" align="center" role="presentation"><tr><td style="background-color: #f3f2ef; padding: 24px 48px 24px 48px;">
        <![endif]-->

        <!-- Body copy -->
        <p>
            The domain <a href="https://{{ $remoteDomain->domain }}">{{ $remoteDomain->domain }}</a> belonging to {{ $hostedDomain->client->name }} 
            has auto-renewed. 
        </p>
        
        @if ($hostedDomain->free_with_mma)
        	<p>
                Because this client is on the Firespring MMA, Firespring will cover the costs associated with this renewal and the client
                will not be charged.
                Unless you wish to stop this process, <span style="font-style: italic;">no action is required on your part.</span> 
            </p>
        @else
        	<p>
            	This domain renewal requires payment from the client, as it is either not related to a site on the Firespring
            	MMA, or it is a secondary domain not covered under the Firespring MMA (the MMA only covers one domain per site).
            </p>
            <p>
            	<b>Please take the following actions:</b>
            	<ol>
            		<li>Communicate to the client that they will be sent an invoice for this renewal.</li>
            		<li>Create a job and invoice the client for this domain.</li>
            		<li>Email the related Enterprise Job number to Jeff Ray.</li>
            	</ol>
            </p>
        @endif
        
        <p>    
            If you believe this to be incorrect, please double check how this domain is configured in the Interactive Clients application and make 
            any changes necessary.
        </p>

        <p>
            If you have any questions, are unsure of what this email means, or what actions are required, please contact the Firespring Interactive Team
            on Slack in the <a href="https://slack.com/app_redirect?channel=technology-interactiv" style="color: #f15b39; text-decoration: underline;">#technology-interactiv</a>
            channel and we will be happy to help.  
        </p>
        <!--[if (gte mso 9)|(IE)]>
        </td></tr></table>
        <![endif]-->
    </div>
</main>
@endsection