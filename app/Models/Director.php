<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $table = 'directors';

    protected $fillable = [
        'name',
        'image',
        'about',
        'email',
        'phone',
        'linkedin',
        'avenue_id',
    ];

    public function avenue()
    {
        return $this->belongsTo(Avenue::class);
    }

    
}
