<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'category',
        'slug',
        'title',
        'description',
        'coverimage',
        'keywords',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            $base = $post->slug !== null && $post->slug !== '' ? $post->slug : $post->title;
            $post->slug = static::uniqueSlugFor(Str::slug($base), $post->id);
        });
    }

    protected static function uniqueSlugFor(string $slug, ?int $ignoreId): string
    {
        if ($slug === '') {
            $slug = 'post';
        }

        $original = $slug;
        $suffix = 2;

        while (
            static::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    /**
     * Resolve a bound value for a route.
     *
     * Numeric values keep resolving by id so old /post/{id} links keep working;
     * everything else resolves by slug.
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if ($field === null && ctype_digit((string) $value)) {
            return $this->where('id', $value)->first();
        }

        return $this->where($field ?? 'slug', $value)->first();
    }
}
