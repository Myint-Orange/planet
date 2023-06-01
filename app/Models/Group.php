<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_at", "updated_at", "name", "user_id", "imgname"];
    public function types()
    {
        return $this->hasMany(Type::class);
    }
    public function gpTitles()
    {
        return $this->hasMany(GpTitle::class);
    }
    public function gpImages()
    {
        return $this->hasMany(GpImage::class);
    }
}
