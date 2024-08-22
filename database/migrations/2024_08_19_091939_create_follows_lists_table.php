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
        Schema::create('follows_lists', function (Blueprint $table) {
	    $table->bigIncrements('id'); // Primary Key
	    $table->unsignedBigInteger('user_id'); // Foreign Key to communities table
	    $table->unsignedBigInteger('list_id'); // Identifier for the follow list
	    $table->softDeletes(); // deleted_at for soft deletes
	    $table->timestamps(); // created_at and updated_at

	    // Foreign key constraints
	    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows_lists');
    }
};
