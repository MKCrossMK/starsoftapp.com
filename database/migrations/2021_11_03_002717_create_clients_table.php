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
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('email')->nullable()->unique();
            $table->integer('tipo_comprobante')->nullable();
            $table->integer('vendedor')->nullable();
            $table->integer('forma_pago')->nullable();
            $table->decimal('balance')->nullable();
            $table->string('tipo_registro')->nullable();
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
