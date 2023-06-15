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
        Schema::create('house_floor_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_floor_id');
            $table->unsignedBigInteger('house_type_id');
            $table->longText('descriptions')->nullable();
            $table->timestamps();
            $table->foreign('house_floor_id')->references('id')->on('house_floors')->onDelete('cascade');
            $table->foreign('house_type_id')->references('id')->on('house_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_floor_types');
    }
};
