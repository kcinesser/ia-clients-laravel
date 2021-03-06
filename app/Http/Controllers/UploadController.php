<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Client;
use App\Http\Requests\UploadRequest;
use App\Project;
use App\Site;
use App\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store (UploadRequest $request, $model, $id) {
        $file = $request->validated();

        $file_name = $file['file']->getClientOriginalName();
        $name = pathinfo($file_name, PATHINFO_FILENAME);
		$extension = $file['file']->getClientOriginalExtension();
		$file_name = $name . "_" . time() . "." . $extension;

        Storage::putFileAs('public/uploads/' . date('Y') . '/' . date('m'), $file['file'], $file_name, 'public');

        if (config('filesystems.default') == 's3') {
            $url = 'https://ia-clients.s3.amazonaws.com/public/uploads/' . date('Y') . '/' . date('m') . '/' . $file_name;
        } else {
            $url = '/storage/uploads/' . date('Y') . '/' . date('m') . '/' . $file_name;
        }

        $path = 'public/uploads/' . date('Y') . '/' . date('m') . '/' . $file_name;

        $upload = new Upload();
        $upload->uploadable_type = 'App\\' . ucfirst($model);
        $upload->uploadable_id = $id;
        $upload->user_id = Auth::id();
        $upload->name = $name;
        $upload->file_name = $file_name;
        $upload->url = $url;
        $upload->path = $path;

        $upload->save();

        return back();
    }

    public function destroy (Upload $upload) {
    	Storage::disk(config('filesystems.default'))->delete($upload->path);

    	$upload->delete();

    	return back();
    }
}
