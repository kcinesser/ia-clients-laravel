<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function store (Request $request, $model, $id) {
        $name_extension = $request->file('file')->getClientOriginalName();
        $nameWithoutExtension = pathinfo($name_extension, PATHINFO_FILENAME);
		$extension = $request->file('file')->getClientOriginalExtension();
        $path = $request->file('file')->storeAs('/public/uploads', $name_extension);
        dd($path);
        dd($filename);

    }
}
