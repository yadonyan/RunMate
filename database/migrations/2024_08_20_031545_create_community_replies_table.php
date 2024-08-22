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
        Schema::create('community_replies', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key
	    $table->unsignedBigInteger('community_post_id'); // Foreign Key to community_posts table
	    $table->unsignedBigInteger('community_id'); // Foreign Key to communities table
	    $table->text('content'); // Reply content
	    $table->string('image')->nullable(); // Image associated with the reply
	    $table->unsignedBigInteger('community_reply_id')->nullable(); // Reply to another reply
	    $table->text('links')->nullable(); // Links associated with the reply
	    $table->timestamps(); // created_at and updated_at
	    $table->softDeletes(); // deleted_at

            // Foreign key constraints
	    $table->foreign('community_post_id')->references('id')->on('community_posts')->onDelete('cascade');
	    $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');
	    $table->foreign('community_reply_id')->references('id')->on('community_replies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_replies');
    }
};
