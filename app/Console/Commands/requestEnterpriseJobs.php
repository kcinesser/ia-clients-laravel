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
            // 'login' => env('ENTERPRISE_USERNAME'),
            // 'password' => env('ENTERPRISE_PASSWORD'),
            'connection_timeout' => 60,
        );

        $soapClient = new SoapClient(null, $options);

        var_dump($soapClient);

        $params = array();
        $credentials = array();
        $credentials[] = new SoapVar(env('ENTERPRISE_USERNAME'), XSD_STRING, null, null, 'Username');
        $credentials[] = new SoapVar(env('ENTERPRISE_PASSWORD'), XSD_STRING, null, null, 'Password');
        $params[] = new SoapVar($credentials, SOAP_ENC_OBJECT, null, null, 'Credentials');
        $params[] = new SoapVar($job_number, XSD_STRING, null, null, 'JobNumber' );

        try {   
            $result = $soapClient->__soapCall('GetJobProductionEntries', $params);
        } catch (\Exception $e){
            print_r($soapClient->__getLastRequest());
            throw new \Exception("SOAP request failed! Response: ".$e);
        }

        Log::info('requestEnterpriseJobs Command run successfully.');
    }
}

