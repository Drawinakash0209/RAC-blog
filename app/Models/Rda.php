<?php

namespace App\Models;

use App\Models\Award;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rda extends Model
{
    use HasFactory;

    protected $table = 'rda';

    protected $fillable = ['name'];


    public function awards()
    {
        return $this->hasMany(Award::class);
    }
}
