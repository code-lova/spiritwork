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
            $table->unsignedBigInteger('userId')->after('id');
            $table->unsignedBigInteger('propertyId')->after('userId');
            $table->tinyInteger('payment_status')->default('0')->after('propertyId');
            $table->string('email')->after('payment_status');
            $table->date('agreement_date')->nullable()->after('email');
            $table->string('name')->nullable()->comment('tenant:in presence of')->after('agreement_date');
            $table->string('address')->nullable()->after('name');
            $table->string('signature')->nullable()->after('address');
            $table->date('date')->nullable()->after('signature');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('propertyId')->references('id')->on('property_listings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agreements', function (Blueprint $table) {
            $table->dropColumn('userId');
            $table->dropColumn('propertyId');
            $table->dropColumn('payment_status');
            $table->dropColumn('email');
            $table->dropColumn('agreement_date');
            $table->dropColumn('name');
            $table->dropColumn('address');
            $table->dropColumn('signature');
            $table->dropColumn('date');
        });
    }
};
