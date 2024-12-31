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
            $table->timestamps();
            $table->string( 'name',20);
            $table->text( 'description');
            $table->integer('discount');
            $table->text( 'unit');
            $table->integer( 'price');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('status',20);
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
