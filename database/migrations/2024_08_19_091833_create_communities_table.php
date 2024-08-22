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
        Schema::create('communities', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key
            $table->unsignedBigInteger('community_id'); // Foreign Key to users table
   	    $table->unsignedBigInteger('user_id'); // Foreign Key to users table
	    $table->string('name');
	    $table->text('description')->nullable();
	    $table->boolean('privates');
	    $table->timestamps();
	    $table->softDeletes();

	    // Foreign key constraint
	    $table->foreign('community_id')->references('id')->on('users')->onDelete('cascade');
	    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
