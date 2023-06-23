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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discount_id')->nullable()->constrained('discounts', 'id');
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
        Schema::dropIfExists('brands');
    }
};
