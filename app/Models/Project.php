<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'coverimage',
    ];

    public function avenues()
    {
        return $this->belongsToMany(Avenue::class, 'avenue_project');
    }
}
