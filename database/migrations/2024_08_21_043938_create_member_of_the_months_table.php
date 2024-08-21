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
        Schema::create('member_of_the_months', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // This will store whether they are a general member or a director of the month.
            $table->string('image'); // This will store the path to the image.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_of_the_months');
    }
};
