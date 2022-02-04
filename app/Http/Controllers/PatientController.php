<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Number;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('patients.index');
    }

    public function buscador($request){
        $mayuscula = strtoupper($request);
        $patients = Patient::where('name','LIKE','%'.$mayuscula.'%')->get();
        return compact('patients');
    }
    public function buscadores($request){
        $patients = Patient::where('number','LIKE','%'.$request.'%')->get();
        return compact('patients');
    }

    // public function report($d_start,$d_end)
    // {
    //     $pacientes = Appointment::whereBetween('fecha', [$d_start, $d_end])->get();

    // }

    public function document(){
        $document = Number::all();
        return compact('document');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    public function tables()
    {
        $patients = Patient::all();
        return compact('patients');
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
        $patient = Patient::firstOrNew(['id' => $id]);
        $patient->fill($request->all());
        $patient->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(patient $patient)
    {
        //
    }
}
