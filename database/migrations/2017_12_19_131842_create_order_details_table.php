<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('bill_id')->unsigned()->nullable();
          $table->foreign('bill_id')->references('id')->on('orders');
          $table->integer('product_id')->unsigned()->nullable();
          $table->foreign('product_id')->references('id')->on('products');
          $table->string('name');
          $table->string('phone');
          $table->string('address_recevie');
          $table->date('ship_date');
          $table->integer('quantily')->unsigned();
          $table->double('unit_price');
          $table->string('note');
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
        Schema::dropIfExists('order_details');
    }
}
