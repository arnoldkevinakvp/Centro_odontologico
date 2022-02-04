<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Appointment_item;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\Document;
use App\Models\Document_type;
use App\Models\Method_type;
use App\Models\Order_payment;
use App\Models\Payment_method_type;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Appointment::where('estado',0);
        return view('citas.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citas.create');
    }

    public function reports($d_start, $d_end)
    {
            $appointment_items = DB::table('appointment_items')
            ->join('appointments','appointments.id','=','appointment_items.appointment_id')
            ->whereBetween('appointments.date_of_treatment', [$d_start, $d_end])->get();
        
        
        return $appointment_items;
    }
    // public function testRegistrarCita()
    // {
    //     $this->withoutExceptionHandling();
    //     $response=$this->post('/citas',[
    //         'date_of_treatment' => '2020-02-05',
    //         'start_time' => '10:15:00',
    //         'end_time' => '10:30:00',
    //         'monto' => '35',
    //         'patient_id' => '1',
    //         'dentist_id' => '1',
    //     ]);
    //     $response->assertOK();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::connection('pgsql')->transaction(function () use ($request) {
            $value = [
                'date_of_treatment' => $request['date_of_treatment'],
                'start_time' => $request['start_time'],
                'end_time' => $request['end_time'],
                'monto' => $request['monto'],
                'patient_id' => $request['patient_id'],
                'dentist_id' => $request['dentist_id'],
            ];
            $this->Appointment = Appointment::create($value);
            foreach ($request['item'] as $row)
            {
                $value2 = [
                    'appointment_id' => $this->Appointment->id,
                    'item_id' => $row['item_id'],
                    'quantity' => $row['quantity'],
                    'unit_value' => $row['unit_value'],
                    'affectation_igv_type_id' => $row['affectation_igv_type_id'],
                    'total_base_igv' => $row['total_base_igv'],
                    'percentage_igv' => $row['percentage_igv'],
                    'total_igv' => $row['total_igv'],
                    'total_base_isc' => $row['total_base_isc'],
                    'percentage_isc' => $row['percentage_isc'],
                    'total_isc' => $row['total_isc'],
                    'total_base_other_taxes' => $row['total_base_other_taxes'],
                    'percentage_other_taxes' => $row['percentage_other_taxes'],
                    'total_other_taxes' => $row['total_other_taxes'],
                    'total_taxes' => $row['total_taxes'],
                    'unit_price' => $row['unit_price'],
                    'total_value' => $row['total_value'],
                    'total_charge' => $row['total_charge'],
                    'total_discount' => $row['total_discount'],
                    'total' => $row['total'],
                ];
                $this->Appointment_item = Appointment_item::create($value2);
            }
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    public function tables(){
        $customers = Patient::all();
        $dentist = Dentist::all();
        return compact ( 'customers','dentist');
    }

    public function table(){
        $records = Appointment::all();
        return compact ( 'records');
    }
    public function buscar($id){
        $records = Appointment::where('id',$id)->get();
        return compact ( 'records');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    




}
