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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('small_image')->nullable(); // 'small_image' for storing URL/path of the small image
            $table->string('large_image')->nullable(); // 'large_image' for storing URL/path of the large image
            $table->string('title'); // 'cim' for the title of the news item
            $table->string('subtitle'); // 'subtitle' for the subtitle of the news item
            $table->string('teaser'); // 'teaser' for the teaser of the news item
            $table->text('content'); // 'content' for the content of the news item
            $table->timestamps();
            $table->softDeletes(); // Adds a `deleted_at` column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
