<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::saving(function ($model) {
            $base = $model->slug !== null && $model->slug !== '' ? $model->slug : $model->{$model->slugSourceColumn()};
            $model->slug = static::uniqueSlugFor(Str::slug($base), $model->id);
        });
    }

    protected function slugSourceColumn(): string
    {
        return 'name';
    }

    protected static function uniqueSlugFor(string $slug, ?int $ignoreId): string
    {
        if ($slug === '') {
            $slug = Str::snake(class_basename(static::class));
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
     * Numeric values keep resolving by id so old numeric-id links keep working;
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
