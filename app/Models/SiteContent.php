<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    /**
     * Get a site content value by key, with an optional fallback.
     */
    public static function getValue(string $key, ?string $fallback = null): ?string
    {
        $content = static::where('key', $key)->first();
        
        if ($content && $content->value !== null && $content->value !== '') {
            return $content->value;
        }

        return $fallback;
    }

    /**
     * Set a site content value (create or update).
     */
    public static function setValue(string $key, ?string $value, string $group = 'general'): static
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
    }

    /**
     * Get all content for a given group as a key => value array.
     */
    public static function getGroup(string $group): array
    {
        return static::where('group', $group)
            ->pluck('value', 'key')
            ->toArray();
    }
}
