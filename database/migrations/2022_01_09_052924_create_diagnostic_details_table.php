<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostic_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('diagnosis_id');
            $table->unsignedInteger('clinic_history_id');
            $table->timestamps();
            
            $table->foreign('diagnosis_id')->references('id')->on('diagnoses');
            $table->foreign('clinic_history_id')->references('id')->on('clinic_histories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostic_detail');
    }
}
