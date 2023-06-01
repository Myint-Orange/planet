<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContent extends Model
{
    use HasFactory;
    protected $fillable = ["id", "content_th", "content_en", "content_ch", "type_id"];
}
