<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNewShoppingCartItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_merchant_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->enum('type', ['normal', 'offer_price', 'auction'])->default('normal');
            $table->string('name_th');
            $table->string('name_en');
            $table->string('option_name');
            $table->text('option');
            $table->text('images');
            $table->decimal('discount_price', 10, 2)->comment('ส่วนลด')->default(0);
            $table->decimal('discount_point', 10, 2)->comment('ส่วนลดแต้ม')->default(0);
            $table->decimal('discount_coupon', 10, 2)->comment('ส่วนลดคูปอง')->default(0);
            $table->decimal('price', 10, 2)->comment('ราคาสินค้า')->default(0);
            $table->decimal('summary', 10, 2)->comment('ราคาสินค้า + ค่าจัดส่ง - ส่วนลด')->default(0);
            $table->integer('quantity');

            $table->timestamps();

            $table->foreign('shopping_cart_merchant_id')
                ->references('id')
                ->on('shopping_cart_merchant')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::dropIfExists('shopping_cart_item');
    }
}
