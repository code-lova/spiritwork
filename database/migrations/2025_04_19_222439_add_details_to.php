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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('email_status')->default('0')->after('email');
            $table->tinyInteger('is_active')->default('1')->after('email_status');
            $table->tinyInteger('role_as')->default('0')->after('is_active');
            $table->string('country')->nullable()->after('email');
            $table->string('phone')->nullable()->after('email');
            $table->string('verification_code')->nullable()->after('phone');
            $table->string('ip_address')->nullable()->after('verification_code');
            $table->dateTime('last_login')->nullable()->after('ip_address');
            $table->timestamp('last_seen')->nullable()->after('last_login');
            $table->string('birth_date')->nullable()->after('country');
            $table->string('marital_status')->nullable()->after('birth_date');
            $table->string('user_image')->nullable()->after('marital_status');
            $table->string('gender')->nullable()->after('user_image');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_status');
            $table->dropColumn('is_active');
            $table->dropColumn('role_as');
            $table->dropColumn('country');
            $table->dropColumn('phone');
            $table->dropColumn('verification_code');
            $table->dropColumn('ip_address');
            $table->dropColumn('last_login');
            $table->dropColumn('last_seen');
            $table->dropColumn('marital_status');
            $table->dropColumn('user_image');
            $table->dropColumn('gender');
        });
    }
};
