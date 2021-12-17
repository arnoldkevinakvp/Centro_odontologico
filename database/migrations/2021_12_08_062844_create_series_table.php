<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_type_id');
            $table->string('number');
            $table->timestamps();
            
            $table->foreign('document_type_id')->references('id')->on('document_types');
        });
        DB::table('series')->insert([
            ['document_type_id' => '01', 'number' => 'F001'],
            ['document_type_id' => '03', 'number' => 'B001'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
