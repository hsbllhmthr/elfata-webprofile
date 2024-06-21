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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->enum('style', ['style1', 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8'])->default('style1');
            $table->text('section_image')->nullable();
            $table->text('section_image_2')->nullable();
            $table->text('section_image_3')->nullable();
            $table->enum('video_type', ['youtube', 'other'])->nullable();
            $table->text('video_url')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('item')->nullable();
            $table->text('button_name')->nullable();
            $table->text('button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
