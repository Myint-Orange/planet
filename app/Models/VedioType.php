<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VedioType extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_at", "updated_at", "name", "type_id", "vedio", "youtube", "coverImg"];
}
