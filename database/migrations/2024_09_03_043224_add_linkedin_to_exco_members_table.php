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
        if (! Schema::hasColumn('exco_members', 'linkedin')) {
            Schema::table('exco_members', function (Blueprint $table) {
                $table->string('linkedin')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('exco_members', 'linkedin')) {
            Schema::table('exco_members', function (Blueprint $table) {
                $table->dropColumn('linkedin');
            });
        }
    }
};
