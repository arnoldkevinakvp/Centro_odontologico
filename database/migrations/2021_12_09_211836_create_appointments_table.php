<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('dentist_id');
            $table->date('date_of_treatment');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('description');
            $table->decimal('monto',12,2);
            $table->timestamps();

            $table->foreign('dentist_id')->references('id')->on('dentists');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
