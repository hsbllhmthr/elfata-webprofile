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
        Schema::create('fixed_page_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('header_style', ['style1', 'style2', 'style3'])->default('style1');
            $table->enum('subscribe_section', ['enable', 'disable'])->default('enable');
            $table->enum('footer_style', ['style1', 'style2', 'style3'])->default('style1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixed_page_settings');
    }
};
