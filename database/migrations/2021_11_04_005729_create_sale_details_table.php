<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales');

            $table->string('tipo_factura');
            $table->string('no_factura');
            $table->string('documento');
            $table->dateTime('fecha');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');


            $table->string('product_name');
            $table->string('code_referencia');

            $table->decimal('precio');
            $table->integer('cantidad');
            $table->decimal('costo');
            $table->integer('itbis');
            $table->integer('descuento');
            $table->decimal('total');
            $table->integer('prod_itbis');

            
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
        Schema::dropIfExists('sale_details');
        Schema::dropIfExists('sales');
    }
}
