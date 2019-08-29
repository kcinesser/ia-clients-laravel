<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Client;
use App\Job;
use App\Site;
use App\Upload;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{
    public function store (Request $request, $model, $id) {


        $name_extension = $request->file('file')->getClientOriginalName();
        $name = pathinfo($name_extension, PATHINFO_FILENAME);
		$extension = $request->file('file')->getClientOriginalExtension();
		$fullname = $name . "_" . time() . "." . $extension;

        $path = Storage::putFileAs('uploads/' . date('Y') . '/' . date('m'), $request->file('file'), $fullname, 'public');
        $url = 'https://ia-clients.s3.amazonaws.com/' . $path;

        $upload = new Upload();
        $upload->uploadable_type = 'App\\' . ucfirst($model);
        $upload->uploadable_id = $id;
        $upload->user_id = Auth::id();
        $upload->name = $name;
        $upload->name_extension = $name_extension;
        $upload->extension = $extension;
        $upload->path = $path;
        $upload->url = $url;

        $upload->save();

        return back();
    }

    public function destroy (Upload $upload) {
    	Storage::disk('s3')->delete($upload->path);

    	$upload->delete();

    	return back();
    }
}
