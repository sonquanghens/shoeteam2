<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name_product');
         $table->integer('branch_id')->unsigned()->nullable();
         $table->foreign('branch_id')->references('id')->on('branchs');
<<<<<<< HEAD
         $table->longText('description');
=======
         $table->text('description');
>>>>>>> 7fd81eb16bc165942a276801c4d035ec3c9726c8
         $table->double('unit_price')->unsigned();
         $table->double('promotion_price')->unsigned();
         $table->string('image');
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
        Schema::dropIfExists('products');
    }
}
