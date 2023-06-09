<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ircontact extends Model
{
    use HasFactory;
    protected $table = 'ircontacts';
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'email',
        'phone',
        'address',
        'locationmap',
    ];
}
