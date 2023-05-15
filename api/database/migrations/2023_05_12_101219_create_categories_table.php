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
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('name', 128)->unique();
            $table->string('icon', 50)->nullable();
            $table->text('description')->nullable();
            $table->integer('level')->default(1);
            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreignUuid('parent_uuid')->nullable()->constrained('categories', 'uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
