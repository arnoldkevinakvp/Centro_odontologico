<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('sexo');
            $table->string('description')->nullable();
            $table->string('telephone')->nullable();
            $table->date('nacimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dentists');
    }
}
