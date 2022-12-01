<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->string('shipping_name')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_tel')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_street')->nullable();
            $table->integer('qty')->nullable();
            $table->string('payment')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
