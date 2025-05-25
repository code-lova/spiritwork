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
            $table->string('landlord_name')->nullable()->after('email');
            $table->string('property_manager_name')->nullable()->after('landlord_name');
            $table->string('signature')->nullable()->after('property_manager_name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('landlord_name');
            $table->dropColumn('property_manager_name');
            $table->dropColumn('signature');

        });
    }
};
