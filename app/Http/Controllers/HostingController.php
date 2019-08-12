<?php

namespace App\Http\Controllers;

use App\Hosting;
use App\Enums\Owners;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

class HostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Hosting::all());
        return redirect('/settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $hosting = new Hosting();
        $owners = Owners::toSelectArray();

        return view('hosting.create', compact('hosting', 'owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Hosting::create($request->validate([
            'name' => 'required',
            'details' => 'nullable',
            'owner' => 'required|numeric'
        ]));

        return redirect('/hosting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function show(Hosting $hosting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function edit(Hosting $hosting)
    {
        $owners = Owners::toSelectArray();
        return view('hosting.edit', compact('hosting', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hosting $hosting)
    {
        $hosting->update($request->validate([
            'name' => 'required',
            'details' => 'nullable',
            'owner' => 'required|numeric'
        ]));

        return redirect('/hosting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hosting $hosting)
    {
        try{
            $hosting->delete();
        }
        catch(\Exception $e){
           if($e->getCode() == 23503){
               return back()->withErrors(['InUse' => 'Unable to delete host. Remove from sites first.']);
           }
        }

        return redirect('/settings');
    }
}
