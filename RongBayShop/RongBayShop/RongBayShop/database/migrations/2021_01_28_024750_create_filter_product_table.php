<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilterProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_product', function (Blueprint $table) {
            $table->id();
            $table->integer('category_product_id')->nullable(); //会社名
            $table->integer('category_filter_id')->nullable(); //会社名
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("category_filter_id")->references("id")->on("category_filter");
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
        Schema::dropIfExists('filter_product');
    }
}
