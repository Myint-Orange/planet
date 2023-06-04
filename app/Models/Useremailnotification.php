<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useremailnotification extends Model
{
    use HasFactory;
    protected $table = 'useremailnotifications';
    protected $fillable = [
        'email',
        'surname',
        'country',
        'occupation',
        'jobposition',
        'industry',
    ];
}
