<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Document;
use App\Models\Document_type;
use App\Models\Method_type;
use App\Models\Payment_method_type;
use App\Models\Order_payment;
use App\Models\Appointment;
use App\Models\Currency_type;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Serie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('documents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    public function citas(){
        return view('reports.citas');
    }

    public function cita(){
        $records = Appointment::where('estado',0)->get();
        return compact('records');
    }
    public function CitasIndex(){
        return view('reports.citas_index');
    }

    public function dashboard(){

        $appointment = Appointment::get();
        $data_array = ['Ene', 'Feb','Mar', 'Abr','May', 'Jun','Jul', 'Ago','Sep', 'Oct', 'Nov', 'Dic'];
        $total = $appointment->count();
        $appointment_by_month = $appointment->groupBy(function($date) {
            return Carbon::parse($date->date_of_treatment)->format('m');
        });
        
        return [
            'totals' => [
                'total' => $total,
            ],
            'graph' => [
                'labels' => $data_array,
                'datasets' => [
                    [
                        'label' => 'Total Citas',
                        'data' => $this->arrayAppointmentbyMonth($appointment_by_month),
                        'backgroundColor' => 'rgb(255, 99, 132)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'borderWidth' => 1,
                        'fill' => false,
                        'lineTension' => 0,
                    ],
                ],
            ]
        ];
    }
    public function dashboard2(){

        $appointment = Appointment::get();
        $data_array = ['Ene', 'Feb','Mar', 'Abr','May', 'Jun','Jul', 'Ago','Sep', 'Oct', 'Nov', 'Dic'];
        $total = $appointment->count();
        $appointment_by_month = $appointment->groupBy(function($date) {
            return Carbon::parse($date->date_of_treatment)->format('m');
        });
        return [
            'totals' => [
                'total_payment' => number_format(180,5),
                'total_to_pay' => number_format(50),
            ],
            'graph' => [
                'labels' => ['Total cobrado', 'Pendiente de cobro'],
                'datasets' => [
                    [
                        'label' => 'Balance',
                        'data' => [180.5, 50],
                        'backgroundColor' => [
                            'rgb(54, 162, 235)',
                            'rgb(255, 99, 132)',
                        ]
                    ]
                ],
            ]
        ];
        
    }

    private function arrayAppointmentbyMonth($appointment_by_month){

        return [
            isset($appointment_by_month['01']) ? 1 : 0,
            isset($appointment_by_month['02']) ? 2 : 0,
            isset($appointment_by_month['03']) ? 3 : 0,
            isset($appointment_by_month['04']) ? 1 : 0,
            isset($appointment_by_month['05']) ? 1 : 0,
            isset($appointment_by_month['06']) ? 1 : 0,
            isset($appointment_by_month['07']) ? 1 : 0,
            isset($appointment_by_month['08']) ? 1 : 0,
            isset($appointment_by_month['09']) ? 1 : 0,
            isset($appointment_by_month['10']) ? 1 : 0,
            isset($appointment_by_month['11']) ? 1 : 0,
            isset($appointment_by_month['12']) ? 1 : 0
        ];

    }

    public function tables(){
        $customers = Patient::all();
        $series = Serie::all();
        $payment_method_types = Payment_method_type::all();
        $method_types = Method_type::all();
        $document_types = Document_type::all();
        $currency_types = Currency_type::all();
        return compact ( 'customers','currency_types','series','payment_method_types','method_types','document_types');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function help(){
        return view('help.index');
    }

    public function linea(){
        return view('help.linea');
    }

    public function order(){
        return view('reports.orders');
    }
    public function pdf(Request $request) {

        $order = Order_payment::all();        
        
        $pdf = PDF::loadView('reports.orders_pdf', compact("order"));

        $filename = 'Reporte_Orden_Pagos'.date('YmdHis');

        return $pdf->setPaper('a4', 'landscape')->download($filename.'.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
