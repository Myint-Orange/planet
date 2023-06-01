<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicType extends Model
{
    use HasFactory;
    protected $fillable = ["id", "created_at", "updated_at", "topic_name_en", "topic_name_th", "topic_name_ch"];

    public function contactForms()
    {
        return $this->hasMany(ContantForm::class);
    }
}
