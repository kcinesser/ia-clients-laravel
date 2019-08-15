<?php

namespace App\Http\Controllers;

use App\SoftwareLicense;
use App\Client;
use App\Job;
use Illuminate\Http\Request;


class SoftwareLicensesController extends Controller
{

    public function store(Request $request, $model, $id)
    {


        $data = $this->validate_data();

        $license = new SoftwareLicense();
        $license->description = $data['description'];
        $license->key = $data['key'];
        $license->url = $data['url'];
        $license->licenseable_type = 'App\\' . ucfirst($model);
        $license->licenseable_id = $id;

        $license->save();

        return redirect()->back();
    }


    public function update(SoftwareLicense $softwareLicense)
    {
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
        return request()->validate([
            'description' => 'required',
            'key' => 'nullable',
            'url' => 'nullable|url'
        ]);
    }
}
