<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateContratStateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat_state_types', function (Blueprint $table) {
            $table->char('id', 2)->index();
            $table->string('description');
        });

        DB::table('contrat_state_types')->insert([
            ['id' => '01', 'description' => 'Registrado'],
            ['id' => '05', 'description' => 'Entregado'],
            ['id' => '09', 'description' => 'Rechazado'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrat_state_types');
    }
}
