<?php

namespace App\Http\Controllers;

use App\SoftwareLicense;
use App\Client;
use App\Http\Requests\SoftwareLicenseRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SoftwareLicenseController extends Controller
{

    public function store(SoftwareLicenseRequest $request, $model, $id)
    {
        $attributes = $request->validated();

        $license = new SoftwareLicense();
        $license->description = $attributes['description'];
        $license->key = $attributes['key'];
        $license->url = $attributes['url'];
        $license->exp_date = $attributes['exp_date'];
        $license->licenseable_type = 'App\\' . ucfirst($model);
        $license->licenseable_id = $id;

        $license->save();

        return redirect()->back();
    }


    public function update(SoftwareLicenseRequest $request, SoftwareLicense $softwareLicense)
    {
        $attributes = $request->validated();
        $softwareLicense->update($attributes);
        
        return redirect()->back();
    }

    public function destroy(SoftwareLicense $softwareLicense)
    {
        $softwareLicense->delete();

        return redirect()->back();
    }
}
