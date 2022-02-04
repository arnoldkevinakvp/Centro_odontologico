<?php

namespace App\Http\Controllers;

use App\Models\Order_payment;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order_payments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order_payments.create');
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
        $patient = Order_payment::firstOrNew(['id' => $id]);
        $patient->fill($request->all());
        $patient->save();
    }

    public function tables()
    {
        $orders = Order_payment::all();
        return compact('orders');
    }

    public function time(){
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_payment  $order_payment
     * @return \Illuminate\Http\Response
     */
    public function show(Order_payment $order_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_payment  $order_payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_payment $order_payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_payment  $order_payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_payment $order_payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_payment  $order_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_payment $order_payment)
    {
        //
    }
}
