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
        Schema::create('property_listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catId');
            $table->unsignedBigInteger('userId');
            $table->string('property_name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->integer('price');
            $table->string('type');
            $table->string('square_ft');
            $table->mediumText('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->integer('master_bedrooms_num');
            $table->integer('bathrooms_num');
            $table->integer('rooms_num');
            $table->tinyInteger('status')->default('0')->comment('1=visible,0=hidden');
            $table->tinyInteger('listing')->default('0')->comment('1=new,0=old');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->foreign('catId')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_listings');
    }
};
