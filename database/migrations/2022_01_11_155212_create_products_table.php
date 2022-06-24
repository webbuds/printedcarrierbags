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
			$table->string('name');
			$table->string('slug');
			$table->string('category');
			$table->string('one_sp');
			$table->string('one_c');
			$table->string('one_total');
			$table->string('one_unit');
			$table->string('three_sp')->nullable();
			$table->string('three_c')->nullable();
			$table->string('three_total')->nullable();
			$table->string('three_unit')->nullable();
			$table->string('five_sp')->nullable();
			$table->string('five_c')->nullable();
			$table->string('five_total')->nullable();
			$table->string('five_unit')->nullable();
			$table->string('ten_sp')->nullable();
			$table->string('ten_c')->nullable();
			$table->string('ten_total')->nullable();
			$table->string('ten_unit')->nullable();
			$table->string('plate_sp')->nullable();
			$table->string('plate_c')->nullable();
			$table->string('plate_total')->nullable();
			$table->string('plate_unit')->nullable();
			$table->string('desc');
			$table->string('f_image');
			$table->string('image_one')->nullable();
			$table->string('image_two')->nullable();
			$table->string('image_three')->nullable();
			$table->string('color')->nullable();
			$table->string('working_days')->nullable();
			$table->string('eco_friendly')->nullable();
			$table->string('best_seller')->nullable();
			$table->string('made_in_the_uk')->nullable();
			$table->string('biodegradable_plastic')->nullable();
			$table->string('free_delivery')->nullable();
			$table->string('status');
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
