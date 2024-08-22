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
        Schema::create('replies', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key
	    $table->unsignedBigInteger('post_id'); // Foreign Key to posts table
	    $table->unsignedBigInteger('user_id'); // Foreign Key to users table
	    $table->text('content'); // Reply content
	    $table->string('image')->nullable(); // Image associated with the reply
	    $table->unsignedBigInteger('reply_id')->nullable(); // Reply to another reply
	    $table->text('links')->nullable(); // Links associated with the reply
	    $table->timestamps(); // created_at and updated_at
	    $table->softDeletes(); // deleted_at

	    // Foreign key constraints
	    $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
	    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	    $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
