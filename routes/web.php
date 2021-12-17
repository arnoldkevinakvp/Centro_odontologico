<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas para los pacientes
Route::get('patients', 'App\Http\Controllers\PatientController@index')->name('patients.index');
Route::get('patients/create', 'App\Http\Controllers\PatientController@create')->name('patients.create');
Route::post('patients', 'App\Http\Controllers\PatientController@store');
Route::get('patients/tables', 'App\Http\Controllers\PatientController@tables');

//Rutas para los odontólogos
Route::get('dentist', 'App\Http\Controllers\DentistController@index')->name('dentist.index');
Route::get('dentist/create', 'App\Http\Controllers\DentistController@create')->name('dentist.create');
Route::post('dentist', 'App\Http\Controllers\DentistController@store');
Route::get('dentist/tables', 'App\Http\Controllers\DentistController@tables');

//Rutas para las citas
Route::get('citas/create', 'App\Http\Controllers\AppointmentController@create')->name('citas.create');
Route::get('citas', 'App\Http\Controllers\AppointmentController@index')->name('citas.index');
Route::post('citas', 'App\Http\Controllers\AppointmentController@store');
Route::get('citas/tables', 'App\Http\Controllers\AppointmentController@tables');

//Rutas para los pagos
Route::get('documents', 'App\Http\Controllers\DocumentController@index')->name('documents.index');
Route::get('documents/create', 'App\Http\Controllers\DocumentController@create')->name('documents.create');
Route::post('documents', 'App\Http\Controllers\DocumentController@store');
Route::get('documents/tables', 'App\Http\Controllers\DocumentController@tables');

//Rutas para ordenes de pago
Route::get('order','App\Http\Controllers\OrderPaymentController@index');
Route::post('orders', 'App\Http\Controllers\OrderPaymentController@store');
Route::get('order/create','App\Http\Controllers\OrderPaymentController@create');
Route::get('orders/tables', 'App\Http\Controllers\OrderPaymentController@tables');

//Rutas para reportes

Route::get('Report','App\Http\Controllers\DocumentController@order')->name('reports.orders');
Route::get('Report/orders/pdf', 'App\Http\Controllers\DocumentController@pdf')->name('reports.orders_pdf');
