<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use SoapClient;
use SoapHeader;
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
        );

        $soapClient = new SoapClient(null, $options);

        $params = array();
        $params[] = new SoapVar('123', null, null, null, 'JobNumber' );

        try{   
            $result = $soapClient->__soapCall('GetJobProductionEntries', $params);
            print_r($soapClient->__getLastRequest());
            print_r($result);
        } catch (\Exception $e){
            print_r($soapClient->__getLastRequest());
            throw new \Exception("SOAP request failed! Response: ".$e);
        }

        Log::info('requestEnterpriseJobs Command run successfully.');
    }
}

