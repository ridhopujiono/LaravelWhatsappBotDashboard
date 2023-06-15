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
        Schema::create('customer_history_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_history_id');
            $table->longText('feedback');
            $table->timestamps();
            $table->foreign('customer_history_id')->references('id')->on('customer_histories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_history_feedback');
    }
};
