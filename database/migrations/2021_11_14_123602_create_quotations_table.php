<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->string('tipo_quote')->nullable();
            $table->string('no_quote')->nullable();
            $table->string('documento')->nullable();
            $table->date('fecha');
            $table->decimal('monto');
            $table->decimal('itbis');
            $table->integer('descuento');
            $table->string('nombre_vendedor');
            $table->string('nombre_usuario');
            $table->string('nombre_cliente');


           

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');



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
        Schema::dropIfExists('quotations');
    }
}
