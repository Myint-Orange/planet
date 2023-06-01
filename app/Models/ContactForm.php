<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_at", "updated_at", "name", "email", "phone", "topic", "message", "topic_id"];
    public function topicType()
    {
        return $this->belongsTo(TopicType::class);
    }
}
