<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('piece_id');
            $table->unsignedInteger('odontogram_id');
            $table->timestamps();

            $table->foreign('piece_id')->references('id')->on('pieces');
            $table->foreign('odontogram_id')->references('id')->on('odontograms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piece_detail');
    }
}
