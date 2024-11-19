<?php

use Faker\Provider\HtmlLorem;
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
        Schema::create('home_page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('title')->unique();
            $table->string('sub_title')->nullable();
            $table->string('image')->nullable();
            $table->string('background_video')->nullable();
            $table->string('background_type')->default('image');
            $table->boolean('is_active')->default(1);
            $table->string('text_position')->default('right')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->json('more_seo_metadata')->nullable();
            $table->json('social_media_seo_meta_data')->nullable();
            $table->mediumText('summary_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_sections');
    }
};
