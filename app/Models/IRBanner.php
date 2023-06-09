<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRBanner extends Model
{
    use HasFactory;
    protected $table = 'irbanners';
    protected $fillable = [
        'image',
        'name_en',
        'name_th',
        'name_ch',
        'irtype',
    ];
}
