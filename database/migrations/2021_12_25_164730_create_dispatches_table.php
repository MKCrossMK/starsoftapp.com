<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();

            $table->string('no_factura');
            $table->date('fecha');
            $table->integer('code_chofer');
            $table->string('descrip_chofer');
            $table->integer('code_vendedor');
            $table->string('name_vendedor');
            $table->integer('code_cliente');
            $table->string('name_cliente');
            $table->string('phone_cliente');
            $table->string('address_provincia');
            $table->string('address_municipio');
            $table->string('address_sector');
            
            $table->string('status');


            $table->string('bultos_paquetes');

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
        Schema::dropIfExists('dispatches');
    }
}
