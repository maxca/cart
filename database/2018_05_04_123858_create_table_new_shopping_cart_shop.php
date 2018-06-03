<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNewShoppingCartShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_merchant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->string('merchant_name');
            $table->decimal('shipping_price', 10, 2)->comment('ค่าจัดส่ง')->default(0);
            $table->decimal('discount_price', 10, 2)->comment('ส่วนลด')->default(0);
            $table->decimal('discount_point', 10, 2)->comment('ส่วนลดแต้ม')->default(0);
            $table->decimal('discount_coupon', 10, 2)->comment('ส่วนลดคูปอง')->default(0);
            $table->decimal('price', 10, 2)->comment('ราคารวมสินค้า')->default(0);
            $table->integer('quantity');
            $table->decimal('net_price', 10, 2)->comment('ราคารวมสินค้า + ค่าจัดส่ง - ส่วนลด')->default(0);
            $table->timestamps();

            $table->foreign('shopping_cart_id')
                ->references('id')
                ->on('shopping_cart')
                ->onDelete('cascade');

            $table->foreign('merchant_id')
                ->references('id')
                ->on('merchant')
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
        Schema::dropIfExists('shopping_cart_merchant');
    }
}
