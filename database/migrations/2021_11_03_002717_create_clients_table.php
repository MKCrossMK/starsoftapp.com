<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('id_erp');
            $table->string('cedula_rnc')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('company_name');
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('phone');
            $table->string('second_phone')->nullable();
            $table->string('third_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('tipo_comprobante')->nullable();
            $table->integer('vendedor')->nullable();
            $table->string('tipo_pago')->nullable();
            $table->decimal('balance')->nullable();
            $table->decimal('porciento_descuento');
            $table->string('tipo_registro')->nullable();

            $table->unsignedBigInteger('province');
            $table->foreign('province')->references('id')->on('provinces');


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
        Schema::dropIfExists('clients');
    }
}
