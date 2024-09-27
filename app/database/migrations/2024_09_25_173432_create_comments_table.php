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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger(column: 'user_id');
            $table->unsignedBigInteger(column: 'post_id');
            $table->text(column:'text');
            $table->integer(column: 'likes');
            $table->integer(column: 'dislikes');

            $table->foreign('user_id')->references(columns: 'id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references(columns: 'id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
