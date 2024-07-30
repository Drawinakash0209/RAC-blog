<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
