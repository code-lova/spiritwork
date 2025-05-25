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
        Schema::table('settings', function (Blueprint $table) {
            $table->integer('caution_fee')->nullable()->after('mobile');
            $table->integer('estate_fee')->nullable()->after('caution_fee');
            $table->integer('legal_fee')->nullable()->after('estate_fee');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('caution_fee');
            $table->dropColumn('estate_fee');
            $table->dropColumn('legal_fee');
        });
    }
};
