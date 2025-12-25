<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lost_found', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->text('description');
            $table->enum('status', ['hilang', 'ditemukan']);
            $table->string('category')->nullable();
            $table->string('location_found')->nullable();
            $table->date('found_date')->nullable();
            $table->string('image_url')->nullable();
            $table->string('contact_person');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_claimed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_found');
    }
};
