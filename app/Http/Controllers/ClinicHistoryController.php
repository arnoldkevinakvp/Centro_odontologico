<?php

namespace App\Http\Controllers;

use App\Models\Clinic_history;
use App\Models\Diagnostic_detail;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Odontogram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('historia_clinica.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history($id){
        $records = $id;
        return view('historia_clinica.create',compact('records'));
    }
    public function create()
    {
                
    }
    public function patient($id){
        $records = Patient::where('id',$id)->get();
        return compact('records');
    }

   

    public function busqueda(){
        return view('historia_clinica.busqueda');
    }

    public function diagnostic($id){
        $idHistory = Clinic_history::where('patient_id',$id)->first();
        
        return compact('idHistory');
    }
    public function table(){
        $records = Appointment::where('estado',0)->get();
        return compact('records');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient_id = $request['patient_id'];
        DB::connection('pgsql')->transaction(function () use ($request) {
            $value = [
                'FechaRegistro' => $request['FechaApertura']
            ];
            $this->Odontogram = Odontogram::create($value);
        });
        DB::connection('pgsql')->transaction(function () use ($request) {
            $values = [
                'FechaApertura' => $request['FechaApertura'],
                'Description' => $request['Description'],
                'patient_id' => $request['patient_id'],
                'odontogram_id' => $this->Odontogram->id,
            ];
            $this->Clinic_history = Clinic_history::create($values);
        });
        $patient = Patient::findOrFail($patient_id);
        $patient->historia  = 1;
        $patient->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic_history  $clinic_history
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic_history $clinic_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic_history  $clinic_history
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic_history $clinic_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic_history  $clinic_history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic_history $clinic_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic_history  $clinic_history
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic_history $clinic_history)
    {
        //
    }
}
