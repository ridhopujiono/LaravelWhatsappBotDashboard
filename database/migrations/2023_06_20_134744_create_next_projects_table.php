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
        Schema::create('next_projects', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number', 20);
            $table->enum('type', ['ruko', 'tanah', 'minat_lain', 'lokasi_request', 'lokasi_fix', 'problem_lain']);
            $table->longText('descriptions');
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
        Schema::dropIfExists('next_projects');
    }
};
