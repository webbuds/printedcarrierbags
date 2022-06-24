<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeriationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veriations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('code');
            $table->string('width');
            $table->string('height');
            $table->string('thikness');
            $table->string('bottom_crust');
            $table->string('product_id');
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
        Schema::dropIfExists('veriations');
    }
}
