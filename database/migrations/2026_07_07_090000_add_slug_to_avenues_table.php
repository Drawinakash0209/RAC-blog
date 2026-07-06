<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('avenues', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        $seenSlugs = [];

        DB::table('avenues')->orderBy('id')->select('id', 'name')->get()->each(function ($avenue) use (&$seenSlugs) {
            $slug = Str::slug($avenue->name);

            if ($slug === '') {
                $slug = 'avenue-'.$avenue->id;
            }

            $original = $slug;
            $suffix = 2;

            while (in_array($slug, $seenSlugs, true)) {
                $slug = $original.'-'.$suffix;
                $suffix++;
            }

            $seenSlugs[] = $slug;

            DB::table('avenues')->where('id', $avenue->id)->update(['slug' => $slug]);
        });

        Schema::table('avenues', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avenues', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
