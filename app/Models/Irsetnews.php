<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irsetnews extends Model
{
    use HasFactory;
    protected $table = 'irsetnews';
    protected $fillable = [
        'created',
        'headline',
    ];
}
