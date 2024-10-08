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
        Schema::table('avenues', function (Blueprint $table) {
            $table->text('description')->nullable(); // Add the description column
            $table->string('cover_image')->nullable(); // Add the cover_image column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avenues', function (Blueprint $table) {
            //
        });
    }
};
