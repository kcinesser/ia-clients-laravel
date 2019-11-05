<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use SoapClient;
use SoapFault;
use SoapVar;

class requestEnterpriseJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:requestEnterpriseJobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request enterprise job actuals and estimates.';

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
        Log::info('Running requestEnterpriseJobs command.');

        $job_number = '348919';

        $options = array(
            'location' => 'https://api.mis.print.firespring.com/EnterpriseWebService/Service.asmx',
            'uri' => 'http://localhost/EnterpriseWebService/Enterprise Connect',
            'soap_version' => SOAP_1_2,
            'trace' => 1,
            'connection_timeout' => 60,
            'exceptions' => 0
        );

        $soapClient = new SoapClient('https://api.mis.print.firespring.com/EnterpriseWebService/Service.asmx?WSDL', $options);

        $params = array(
            'Credentials' => array(
                'Username' => env('ENTERPRISE_USERNAME'),
                'Password' => env('ENTERPRISE_PASSWORD')
            ),
            'JobNumber' => $job_number
        );

        try {   
            $result = $soapClient->GetJobProductionEntries($params);
        } catch (\Exception $e){
            throw new \Exception("SOAP request failed! Response: ".$e);
        }

        $total = 0;

        foreach($result->GetJobProductionEntriesResult->ProductionEntry as $entry) {
            if($entry->Description === "Interactive Development" || $entry->Description === "Interactive Project Management") {
                $total += $entry->ElapsedTime;
            }
        }

        echo("Total time: " . $total / 60 . "\n");


        $params2 = array(
            'Credentials' => array(
                'Username' => env('ENTERPRISE_USERNAME'),
                'Password' => env('ENTERPRISE_PASSWORD')
            ),
            'JobType' => 'Creative',
            'FilterType' => '2019',
            'FilteryCriteria' => '2019'
        );

        try {   
            $result2 = $soapClient->GetJobList($params2);
        } catch (\Exception $e){
            throw new \Exception("SOAP request failed! Response: ".$e);
        }

        var_dump($result2);

        Log::info('requestEnterpriseJobs Command run successfully.');
    }
}

