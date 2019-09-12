@extends('layouts.notification_email')

@section('title')
	Expiration notice: {{ $remoteDomain->domain }}
@endsection

@section('headline')
	<span style="display: block">{{ $remoteDomain->domain }}</span> has expired.
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
            The domain belonging to {{ $hostedDomain->client->name }} expired on <span style="white-space: nowrap;">{{ $remoteDomain->expires->toFormattedDateString() }}</span>. 
        </p>
        
        
        @if ($hostedDomain->free_with_mma)
        	<p>
        		<b>Important!!!</b> <span style="font-style: italic;">This domain is listed as "Free With MMA" in the 
        		Interactive Clients software! <span style="text-decoration: underline;">Please double check this domain 
        		carefully.</span></span>
        	</p>
        @endif
        
        <p>
            Any site or subdomain site tied to this domain is no longer available on the internet and the client may 
        	lose valuable traffic and incur negative SEO impact if they did not intend for this domain to expire. 
        	It is also possible for someone to purchase the domain out from under the client now.
        </p>
        
        <p>
        	If this domain is no longer needed, please ensure that no client sites or subdomain sites are existing at this domain. If any sites or
        	subdomain sites were formerly tied to this domain, please verify that the client no longer needs those sites, and create any offboarding requests 
        	as necessary. 
        </p>
        
        <p>
            If you wish to recover this domain, you may have a small window of time to recover it, but 
            <span style="font-style: italic; text-decoration: underline;">action is required on your part.</span> 
            If the domain is ok to expire, you may disregard this message.
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