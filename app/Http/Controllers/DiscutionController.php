<?php

namespace App\Http\Controllers;

use App\Models\Discution;
use App\Http\Requests\StoreDiscutionRequest;
use App\Http\Requests\UpdateDiscutionRequest;

class DiscutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscutionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscutionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function show(Discution $discution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function edit(Discution $discution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscutionRequest  $request
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscutionRequest $request, Discution $discution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discution  $discution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discution $discution)
    {
        //
    }
}
