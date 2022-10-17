<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransactionDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_code',3);
            $table->string('document_number',10)->index();
            $table->string('product_code', 18)->index();
            $table->double('price',6);
            $table->integer('quantity');
            $table->string('unit', 5);
            $table->double('subtotal', 10);
            $table->string('currency', 5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
}
