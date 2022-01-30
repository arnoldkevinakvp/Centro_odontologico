<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->unsignedInteger('item_id');
            $table->json('item');
            $table->decimal('quantity', 12, 2);
            $table->decimal('unit_value', 12, 2);

            $table->string('affectation_igv_type_id');
            $table->decimal('total_base_igv', 12, 2);
            $table->decimal('percentage_igv', 12, 2);
            $table->decimal('total_igv', 12, 2);

            $table->decimal('total_base_isc', 12, 2)->default(0);
            $table->decimal('percentage_isc', 12, 2)->default(0);
            $table->decimal('total_isc', 12, 2)->default(0);

            $table->decimal('total_base_other_taxes', 12, 2)->default(0);
            $table->decimal('percentage_other_taxes', 12, 2)->default(0);
            $table->decimal('total_other_taxes', 12, 2)->default(0);
            $table->decimal('total_taxes', 12, 2);
            $table->decimal('total_plastic_bag_taxes', 6, 2)->default(0);

            $table->decimal('unit_price', 12, 2);

            $table->decimal('total_value', 12, 2);
            $table->decimal('total_charge', 12, 2)->default(0);
            $table->decimal('total_discount', 12, 2)->default(0);
            $table->decimal('total', 12, 2);

            $table->json('attributes')->nullable();
            $table->json('discounts')->nullable();
            $table->json('charges')->nullable();
            
            $table->unsignedInteger('warehouse_id')->nullable();
            $table->text('additional_information')->nullable();

            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('affectation_igv_type_id')->references('id')->on('affectation_igv_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_documents');
    }
}
