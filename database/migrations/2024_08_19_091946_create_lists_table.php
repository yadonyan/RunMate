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
        Schema::create('lists', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key
	    $table->unsignedBigInteger('user_id'); // Foreign Key to users table
	    $table->string('name'); // Name of the list
	    $table->text('description')->nullable(); // Description of the list
	    $table->boolean('privates')->default(false); // Privates
	    $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at

	    // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};
