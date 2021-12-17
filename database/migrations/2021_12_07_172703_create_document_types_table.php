<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_types', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active');
            $table->string('short')->nullable();
            $table->string('description');
            $table->timestamps();
        });

        DB::table('document_types')->insert([
            ['id' => '01', 'active' => true,  'short' => 'FT', 'description' => 'FACTURA ELECTRÓNICA'],
            ['id' => '03', 'active' => true,  'short' => 'BV', 'description' => 'BOLETA DE VENTA ELECTRÓNICA'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_types');
    }
}
