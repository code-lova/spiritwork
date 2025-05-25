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
        Schema::table('agreements', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id');
        });

        // Step 2: Populate UUIDs for existing records
        \App\Models\Agreement::whereNull('uuid')->get()->each(function ($agreement) {
            $agreement->uuid = \Illuminate\Support\Str::uuid();
            $agreement->save();
        });

        // Step 3: Now apply the UNIQUE constraint (after values are populated)
        Schema::table('agreements', function (Blueprint $table) {
            $table->unique('uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agreements', function (Blueprint $table) {
            //
        });
    }
};
