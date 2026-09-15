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
        // The original `year()` column is a strict MySQL YEAR type that only
        // accepts a single 4-digit value (1901-2155). The create/edit forms
        // ask for an academic year like "2023/2024", so saving that format
        // throws a SQL error. Store it as a plain string instead.
        Schema::table('annual_reports', function (Blueprint $table) {
            $table->string('year', 9)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('annual_reports', function (Blueprint $table) {
            $table->year('year')->change();
        });
    }
};
