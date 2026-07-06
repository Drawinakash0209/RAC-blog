<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasSlug;

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

    protected function slugSourceColumn(): string
    {
        return 'title';
    }
}
