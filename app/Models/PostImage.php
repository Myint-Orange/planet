<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;
    protected $fillable = ["id", "post_id", "name_en", "name_th", "name_ch", "created_at", "updated_at",];
}
