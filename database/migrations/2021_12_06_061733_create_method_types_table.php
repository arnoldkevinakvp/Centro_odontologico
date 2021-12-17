<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMethodTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('method_types')->insert([
            ['id' => '01', 'name' => 'Contado'],
            ['id' => '02', 'name' => 'Crédito con cuotas'],
            ['id' => '03', 'name' => 'Crédito']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('method_types');
    }
}
