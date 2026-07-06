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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        $seenSlugs = [];

        DB::table('projects')->orderBy('id')->select('id', 'name')->get()->each(function ($project) use (&$seenSlugs) {
            $slug = Str::slug($project->name);

            if ($slug === '') {
                $slug = 'project-'.$project->id;
            }

            $original = $slug;
            $suffix = 2;

            while (in_array($slug, $seenSlugs, true)) {
                $slug = $original.'-'.$suffix;
                $suffix++;
            }

            $seenSlugs[] = $slug;

            DB::table('projects')->where('id', $project->id)->update(['slug' => $slug]);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
