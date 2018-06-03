<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNewShoppingCartShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_shipping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_merchant_id')->unsigned();
            $table->integer('shipping_id')->unsigned();
            $table->string('name');
            $table->string('code');
            $table->string('provider');
            $table->decimal('price');
            $table->timestamps();

            $table->foreign('shopping_cart_merchant_id')
                ->references('id')
                ->on('shopping_cart_merchant')
                ->onDelete('cascade');

            $table->foreign('shipping_id')
                ->references('id')
                ->on('shipping_list')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart_shipping');
    }
}
