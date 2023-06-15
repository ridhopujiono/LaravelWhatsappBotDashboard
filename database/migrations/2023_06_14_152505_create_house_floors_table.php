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
        Schema::create('house_floors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_point_id');
            $table->string('floor_name');
            $table->timestamps();
            $table->foreign('location_point_id')->references('id')->on('location_points')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_floors');
    }
};
