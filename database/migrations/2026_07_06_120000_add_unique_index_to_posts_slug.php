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
        $seenSlugs = [];

        DB::table('posts')->orderBy('id')->select('id', 'slug', 'title')->get()->each(function ($post) use (&$seenSlugs) {
            $slug = $post->slug !== null && $post->slug !== '' ? Str::slug($post->slug) : Str::slug($post->title);

            if ($slug === '') {
                $slug = 'post-'.$post->id;
            }

            $original = $slug;
            $suffix = 2;

            while (in_array($slug, $seenSlugs, true)) {
                $slug = $original.'-'.$suffix;
                $suffix++;
            }

            $seenSlugs[] = $slug;

            if ($slug !== $post->slug) {
                DB::table('posts')->where('id', $post->id)->update(['slug' => $slug]);
            }
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropUnique(['slug']);
        });
    }
};
