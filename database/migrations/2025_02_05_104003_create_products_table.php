<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string("category");
            $table->string("name");
            $table->string("image");
            $table->string("video")->nullable();
            $table->string("color");
            $table->integer("quantity");
            $table->string("size")->nullable();
            $table->longText("description");
            $table->double("price",20,1);
            $table->double("discount",10,1)->default(0);
            $table->boolean("is_promoted")->default(false);
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
