<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider1_h5')->nullable();
            $table->string('slider1_h1')->nullable();
            $table->string('slider1_quick_info')->nullable();
            $table->string('slider1_image');

            $table->string('slider2_h5')->nullable();
            $table->string('slider2_h1')->nullable();
            $table->string('slider2_quick_info')->nullable();
            $table->string('slider2_image');

            $table->string('slider3_h5')->nullable();
            $table->string('slider3_h1')->nullable();
            $table->string('slider3_quick_info')->nullable();
            $table->string('slider3_image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_sliders');
    }
};
