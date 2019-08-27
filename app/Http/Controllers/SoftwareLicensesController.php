<?php

namespace App\Http\Controllers;

use App\SoftwareLicense;
use App\Client;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SoftwareLicensesController extends Controller
{

    public function store(Request $request, $model, $id)
    {


        $validator = $this->validate_data();

        if($validator->fails()){
            return redirect()->back()->withErrors($validator, 'license_errors');
        }

        $data = $validator->valid();

        $license = new SoftwareLicense();
        $license->description = $data['description'];
        $license->key = $data['key'];
        $license->url = $data['url'];
        $license->exp_date = $data['exp_date'];
        $license->licenseable_type = 'App\\' . ucfirst($model);
        $license->licenseable_id = $id;

        $license->save();

        return redirect()->back();
    }


    public function update(SoftwareLicense $softwareLicense)
    {
        dd($softwareLicense);
        $softwareLicense->update($this->validate_data());
        return redirect()->back();
    }

    public function destroy(SoftwareLicense $softwareLicense)
    {
        $softwareLicense->delete();

        return redirect()->back();
    }

    /**
     * Validates form data
     */
    private function validate_data(){

        $validator = Validator::make(
            request()->all(),
            [
                'description' => 'required',
                'key' => 'nullable',
                'url' => 'nullable|url',
                'exp_date' => 'date|nullable'
            ]
        );


        return $validator;
    }
}
