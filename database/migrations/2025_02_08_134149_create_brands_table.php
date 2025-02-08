<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name', 50); // Brand name
            $table->string('logo', 100)->nullable(); // Brand logo
            $table->integer('top')->default(0); // Flag to indicate top brand
            $table->string('slug', 255)->nullable()->index(); // Slug for SEO-friendly URLs
            $table->string('meta_title', 255)->nullable(); // Meta title for SEO
            $table->text('meta_description')->nullable(); // Meta description for SEO
            $table->timestamps(); // created_at and updated_at
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
