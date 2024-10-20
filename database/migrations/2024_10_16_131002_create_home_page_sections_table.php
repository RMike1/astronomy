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
            $table->string('slug')->unique();
            $table->string('title')->unique();
            $table->string('sub_title');
            $table->string('image');
            $table->string('background_video');
            $table->string('background_type')->default('image');
            $table->boolean('is_active')->default(1);
            $table->string('text_position')->default('right')->nullable();
            $table->mediumText('summary_description');
            $table->longText('full_description');
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
