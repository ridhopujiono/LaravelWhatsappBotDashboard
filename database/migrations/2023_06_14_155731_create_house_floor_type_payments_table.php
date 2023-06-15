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
        Schema::create('house_floor_type_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_floor_type_id');
            $table->longText('descriptions');
            $table->enum('payment_type', ['cash', 'tempo', 'credit']);
            $table->timestamps();
            $table->foreign('house_floor_type_id')->references('id')->on('house_floor_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_floor_type_payments');
    }
};
