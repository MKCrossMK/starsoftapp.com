<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('no_receipt');
            $table->date('fecha');
            $table->date('fecha_vencimiento');
            $table->decimal('monto');
            $table->decimal('balance');
            $table->boolean('anulado')->default(false);
            $table->string('concepto')->nullable();


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
        Schema::dropIfExists('receipts');
    }
}
