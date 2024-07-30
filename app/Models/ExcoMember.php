<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcoMember extends Model
{
    protected $table = 'exco_members';

    protected $fillable = [
        'name',
        'position',
        'email',
        'about',
        'image',
        'phone',
    ];
    
    use HasFactory;
}
