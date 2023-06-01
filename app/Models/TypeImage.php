<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeImage extends Model
{
    use HasFactory;
    protected $fillable = ["id", "type_id", "name_en", "name_th", "name_ch", "created_at", "updated_at",];
    public function typeImages()
    {
        return $this->hasMany(TypeImage::class);
    }
}
