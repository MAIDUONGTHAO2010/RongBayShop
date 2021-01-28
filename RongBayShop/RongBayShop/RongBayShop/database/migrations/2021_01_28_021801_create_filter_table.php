<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter', function (Blueprint $table) {
            $table->id();
            $table->string('name',500)->nullable(); //会社名
            $table->string('description',500)->nullable(); //会社名
            $table->integer('category_filter_id')->nullable(); //会社名
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("category_filter_id")->references("id")->on("category_filter");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filter');
    }
}
