<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'coverimage',
    ];

    public function avenues()
    {
        return $this->belongsToMany(Avenue::class, 'avenue_project');
    }
}
