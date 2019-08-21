<?php

namespace App\Http\Controllers;

use App\Registrar;
use App\Enums\Owners;
use Illuminate\Http\Request;

class RegistrarsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        $attributes = request()->all();

        $registrar = Registrar::create($attributes);

        return redirect('/settings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrar $registrar)
    {
        request()->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        $attributes = request()->all();

        $registrar->update($attributes);

        return redirect('/settings');
    }

    public function destroy(Registrar $registrar) {
        try{
            $registrar->delete();
        }
        catch(\Exception $e){
           if($e->getCode() == 23503){
               return back()->withErrors(['InUse' => 'Unable to delete registrar. Remove from domains first.']);
           }
        }

        return redirect('/settings');
    }
}
