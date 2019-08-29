<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;

class domainRenewalMonthRemainingNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:domainRenewalMonthRemainingNotice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a notice to AMs alerting them about upcoming or processed domain renewals.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Running domainRenewalMonthRemainingNotice command.');
        // Get all domains that expire in 1 month from today
        
        // For each domain {
        //   if the domain belongs to a site under the MMA, send an email to AM saying that it will be taken care of at no charge
        //   if the domain belongs to a site NOT under the MMA, send an email to AM saying that it will be renewing and an invoice will need to be generated
        // }
        Log::info('domainRenewalMonthRemainingNotice Command run successfully.');
    }
}
