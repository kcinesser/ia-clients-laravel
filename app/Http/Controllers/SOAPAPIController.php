<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;


class SOAPAPIController extends Controller
{
    public function index() {
        $credentials = [
            'username' => env('ENTERPRISE_USERNAME'),
            'password' => env('ENTERPRISE_PASSWORD')
        ];

        $url = 'http://example.com/sampleapi/test.asmx?WSDL';
        $client = new SoapClient($url, array("soap_version" => SOAP_1_2,"trace" => 1));

        dd($client);
        
        $user_param = array (
          'WebProviderLoginId' => "test",
          'WebProviderPassword' => "test",
          'IsAgent' => false
        );
        
        $service_param = array (
          'objSecurity' => $user_param,
          "OutPut" => NULL,
          "ErrorMsg" => NULL
        );

        print_r(
            $client->__soapCall(
                "Login",
                array($service_param)
            )
         );


        return view('api');
    }
}
