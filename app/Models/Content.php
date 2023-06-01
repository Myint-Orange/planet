<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ["id", "content_th", "content_en", "content_ch", "post_id"];
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
