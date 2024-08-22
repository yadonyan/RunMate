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
        Schema::create('posts', function (Blueprint $table) {
	    $table->bigIncrements('id'); // Primary Key
	    //$table->unsignedBigInteger('post_id'); // Foreign Key to posts table
	    $table->unsignedBigInteger('user_id'); // Foreign Key to users table
	    $table->text('content'); // Post content
	    $table->string('image')->nullable(); // Image associated with the post
	    $table->unsignedBigInteger('replied')->nullable(); // Foreign key to another post (for replies)
	    $table->text('links')->nullable(); // Links associated with the post
            $table->timestamps(); // created_at and updated_at
	    $table->softDeletes(); // deleted_at

	    // Foreign key constraints
	    //$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
	    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	    $table->foreign('replied')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
