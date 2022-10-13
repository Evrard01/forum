<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use App\Http\Requests\StoreSujetRequest;
use App\Http\Requests\UpdateSujetRequest;

class SujetController extends Controller
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
     * @param  \App\Http\Requests\StoreSujetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSujetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function show(Sujet $sujet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function edit(Sujet $sujet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSujetRequest  $request
     * @param  \App\Models\Sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSujetRequest $request, Sujet $sujet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sujet $sujet)
    {
        //
    }
}
