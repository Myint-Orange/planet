<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpTitle extends Model
{
    use HasFactory;
    protected $fillable = ["id", "title_th", "title_en", "title_ch", "group_id"];
}
