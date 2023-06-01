<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTitle extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_by", "updated_by", "title_en", "title_ch", "title_th", "type_id"];
}
