<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->string('tipo_factura');
            $table->integer('no_factura');
            $table->string('documento');
            $table->date('fecha');
            $table->decimal('monto');
            $table->decimal('itbis');
            $table->decimal('descuento');
            $table->string('t_pago');
            $table->string('t_cobro');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->string('tipo_ncf');
            $table->string('ncf');

            $table->string('no_cheque')->nullable();
            $table->string('banco_cheque')->nullable();
            $table->decimal('balance');


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
        Schema::dropIfExists('sales');
        Schema::dropIfExists('sale_details');
    }
}
