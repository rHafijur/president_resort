<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address');
            $table->integer('post_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->string('nid');
            $table->string('company')->nullable();
            // $table->string('payment_type');
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
        Schema::dropIfExists('bookings');
    }
}
