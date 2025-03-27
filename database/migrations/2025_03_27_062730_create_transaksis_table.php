<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderan_laundry_id');
            $table->decimal('amount', 8, 2);
            $table->date('transaction_date');
            $table->timestamps();

            $table->foreign('orderan_laundry_id')->references('id')->on('orderan_laundry');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}