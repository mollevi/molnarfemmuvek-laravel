<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // 'tartalom' for the content of the message
            $table->timestamp('timestamp'); // 'idopont' for the timestamp when the message was sent or created
            $table->timestamps(); // Automatically managed created_at and updated_at columns
            $table->softDeletes(); // Adds a `deleted_at` column for soft deletes

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
