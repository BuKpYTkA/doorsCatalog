<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('price')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('type_id')->default(null);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('main_products');
    }
}
