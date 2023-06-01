<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_at", "updated_at", "group_id", "name", "user_id", "imgname"];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function typeTitles()
    {
        return $this->hasMany(TypeTitle::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function typeContents()
    {
        return $this->hasMany(TypeContent::class);
    }
    public function typeImages()
    {
        return $this->hasMany(TypeImage::class);
    }
    public function networks()
    {
        return $this->hasMany(Network::class);
    }
    public function vedioTypes()
    {
        return $this->hasMany(VedioType::class);
    }
}
