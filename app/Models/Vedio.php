<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vedio extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_at", "updated_at", "name", "post_id", "vedio", "youtube", "coverImg"];
}
