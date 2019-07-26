<?php

namespace App\Http\Controllers;

use App\Registrar;
use App\Enums\Owners;
use Illuminate\Http\Request;

class RegistrarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrars = Registrar::all();

        return view('registrars.index', compact('registrars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owners::toSelectArray();

        return view('registrars.create', compact('owners'));
    }

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
     * Display the specified resource.
     *
     * @param  \App\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function show(Registrar $registrar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrar $registrar) {
        $owners = Owners::toSelectArray();

        return view('registrars.edit', compact('owners', 'registrar'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrar $registrar)
    {
        //
    }
}
