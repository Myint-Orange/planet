<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_at", "updated_at", "imgname", "type_id", "user_id", "name"];
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    public function titles()
    {
        return $this->hasMany(Title::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }
    public function vedios()
    {
        return $this->hasMany(Vedio::class);
    }
}
