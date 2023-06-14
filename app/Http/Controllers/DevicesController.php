<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authenticated.user.devices');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function showAddForm()
    {
        return view('authenticated.user.add_devices');
    }


    public function device_type(Request $request){
        $request->validate([
            'devicetype' => 'required',
        ]);
        return view('authenticated.user.device_type')->with(["devicetype"=>$request->devicetype]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
