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
            $table->string('small_image')->nullable(); // 'kis_kep' for storing URL/path of the small image
            $table->string('large_image')->nullable(); // 'nagy_kep' for storing URL/path of the large image
            $table->string('title'); // 'cim' for the title of the news item
            $table->text('content'); // 'tartalom' for the content of the news item
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
