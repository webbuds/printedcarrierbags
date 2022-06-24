<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('billing_address');
            $table->string('billing_address2');
            $table->string('country');
            $table->string('city');
            $table->string('zipcode');
            $table->string('cname');
            $table->string('email');
            $table->string('fname1')->nullable();
            $table->string('lname1')->nullable();
            $table->string('cname1')->nullable();
            $table->string('country1')->nullable();
            $table->string('billing_address1')->nullable();
            $table->string('billing_address2_1')->nullable();
            $table->string('state1')->nullable();
            $table->string('city1')->nullable();
            $table->string('zipcode1')->nullable();
            $table->string('quantity')->nullable();
            $table->string('stripeToken')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
