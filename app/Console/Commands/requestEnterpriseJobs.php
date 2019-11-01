<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use SoapClient;
use SoapHeader;
use SoapParam;
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

        $options = array(
            'location' => 'https://api.mis.print.firespring.com/EnterpriseWebService/Service.asmx',
            'uri' => 'http://localhost/EnterpriseWebService/Enterprise Connect',
            'soap_version' => SOAP_1_2,
            'trace' => 1,
            'login' => env('ENTERPRISE_USERNAME'),
            'password' => env('ENTERPRISE_PASSWORD')
        );

        $soapClient = new SoapClient(null, $options);        

        try{   
            $result = $soapClient->__soapCall('GetJobProductionEntries',
                array(
                    new SoapVar(array(
                        new SoapVar(env('ENTERPRISE_USERNAME'), XSD_STRING, null, null, 'Username'),
                        new SoapVar(env('ENTERPRISE_PASSWORD'), XSD_STRING, null, null, 'Password')
                    ), XSD_ANYTYPE, null, null, 'Credentials'),
                    new SoapVar('348919', XSD_STRING, null, null, 'JobNumber')
                )
            );
            print_r($soapClient->__getLastRequest());
        } catch (\Exception $e){
            print_r($soapClient->__getLastRequest());
            throw new \Exception("SOAP request failed! Response: ".$e);
        }

        Log::info('requestEnterpriseJobs Command run successfully.');
    }
}

