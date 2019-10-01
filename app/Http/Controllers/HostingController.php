<?php

namespace App\Http\Controllers;

use App\Hosting;
use App\Enums\Owners;
use App\Http\Requests\HostingRequest;
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
    public function store(HostingRequest $request)
    {
        $attributes = $request->validated();
        Hosting::create($attributes);

        return redirect('/settings');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function update(HostingRequest $request, Hosting $hosting)
    {
        $attributes = $request->validated();
        $hosting->update($attributes);

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
