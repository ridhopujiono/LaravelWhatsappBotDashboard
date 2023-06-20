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
        Schema::create('urgent_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_floor_type_id');
            $table->enum('urgent_type', ['hot', 'warm']);
            $table->string('follow_up');
            $table->string('phone_number');
            $table->foreign('house_floor_type_id')->references('id')->on('house_floor_types')->onDelete('cascade');
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
        Schema::dropIfExists('urgent_projects');
    }
};
