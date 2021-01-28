<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',500)->nullable(); //会社名
            $table->string('file',500); //会社名
            $table->integer('category_product_id'); //会社名
            $table->string('description',500)->nullable(); //郵便番号
            $table->string('price',10)->nullable(); //会社名
            $table->string('code',10)->nullable(); //会社名
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("category_product_id")->references("id")->on("category_product");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
