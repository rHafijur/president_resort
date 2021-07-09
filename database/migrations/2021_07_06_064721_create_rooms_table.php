<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->float("rent");
            $table->integer("capacity");
            // $table->integer("children")->default(0);
            $table->string('image')->nullable();
            $table->text("images")->default("[]");
            $table->boolean("has_tv")->default(0);
            $table->boolean("has_breakfast")->default(0);
            $table->boolean("has_free_parking")->default(0);
            $table->boolean("has_wifi")->default(0);
            $table->boolean("has_ac")->default(0);
            $table->string("occupancy")->nullable();
            $table->string("size")->nullable();
            $table->string("view")->nullable();
            $table->string("room_service")->nullable();
            $table->string("terraces")->nullable();
            $table->string("free_pickup_facility")->nullable();
            $table->string("free_internet")->nullable();
            $table->string("gym")->nullable();
            $table->string('seo_title')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->boolean("is_active")->default(1);
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
        Schema::dropIfExists('rooms');
    }
}
