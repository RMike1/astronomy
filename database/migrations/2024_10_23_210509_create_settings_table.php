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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->json('more_seo_metadata')->nullable();
            $table->json('social_media_seo_meta_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

