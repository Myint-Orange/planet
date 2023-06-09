<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irnews extends Model
{
    use HasFactory;
    protected $table = 'irnews';
    protected $fillable = [
        'created',
        'headline',
    ];
}
