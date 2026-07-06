<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Director;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avenue extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'avenues';

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
        'cover_image',
    ];

    public function directors()
    {
        return $this->hasMany(Director::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'avenue_project');
    }
}
