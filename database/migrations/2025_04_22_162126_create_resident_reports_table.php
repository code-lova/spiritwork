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
        Schema::create('resident_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // sender (tenant)
            $table->string('title');
            $table->longText('message');
            $table->string('attachment')->nullable()->comment('Image attachments');
            $table->boolean('is_read')->default(false); // for admin to track unread messages

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resident_reports');
    }
};
