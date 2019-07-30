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
        request()->validate([
            'description' => 'required',
            'key' => 'required'
        ]);

        $license = new SoftwareLicense();
        $license->description = request('description');
        $license->key = request('key');
        $license->url = request('url');
        $license->licenseable_type = 'App\\' . ucfirst($model);
        $license->licenseable_id = $id;

        $license->save();

        return redirect()->back();
    }


    public function update(SoftwareLicense $softwareLicense)
    {
        request()->validate([
            'description' => 'required',
            'key' => 'required'
        ]);

        $attributes = request()->all();

        $softwareLicense->update($attributes);

        return redirect()->back();
    }

    public function destroy(SoftwareLicense $softwareLicense)
    {
        $softwareLicense->delete();

        return redirect()->back();
    }
}
