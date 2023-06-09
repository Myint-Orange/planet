<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financialinformation extends Model
{
    use HasFactory;
    protected $fillable = ['rationame_en', 'rationame_th', 'rationame_ch', 'ratiotype_en', 'ratiotype_th', 'ratiotype_ch', 'yearone', 'yeartwo', 'yearthree'];
}
