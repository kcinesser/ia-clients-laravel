<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function store (Request $request, $model, $id) {
        $filename = $request->file('file')->getClientOriginalName();
        $name = pathinfo($filename, PATHINFO_FILENAME);
        dd($filename);

    }
}
