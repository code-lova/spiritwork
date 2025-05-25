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
        Schema::create('replied_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id'); // reference to resident report
            $table->unsignedBigInteger('admin_id'); // sender (admin)
            $table->unsignedBigInteger('tenant_id'); // receiver (tenant)
            $table->text('reply');
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('resident_reports')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replied_reports');
    }
};
