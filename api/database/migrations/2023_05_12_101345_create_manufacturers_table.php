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
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->foreignUuid('discount_uuid')->nullable()->constrained('discounts', 'uuid');
            $table->string('name', 512)->unique();
            $table->text('description')->nullable();
            $table->string('logo', 50);
            $table->string('phone_number', 30)->unique();
            $table->string('email', 512)->unique();
            $table->string('address', 512)->unique();
            $table->enum('status', [1, 2])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacturers');
    }
};
