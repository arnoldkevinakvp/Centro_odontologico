<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dentist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dentist.create');
    }

    public function tables()
    {
        $dentist = Dentist::all();
        return compact('dentist');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $patient = Dentist::firstOrNew(['id' => $id]);
        $patient->fill($request->all());
        $patient->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function show(Dentist $dentist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function edit(Dentist $dentist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dentist $dentist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dentist $dentist)
    {
        //
    }
}
