<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name',20)->nullable();
            $table->string('password',10)->nullable();
            $table->string('email',30)->nullable();
            $table->string('phone',10);
            $table->String('address');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
