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

        return redirect('/settings');
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

        return redirect('/settings');
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

        return redirect('/settings');
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
