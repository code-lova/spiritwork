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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img');
            $table->string('banner_title');
            $table->string('about_title');
            $table->longText('about_text');
            $table->longText('our_vision');
            $table->longText('our_mission');
            $table->string('side1_img');
            $table->string('side2_img');
            $table->string('mv_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
