<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditrating extends Model
{
    use HasFactory;
    protected $fillable = [
        'credit_type',
        'rating_agency',
        'credit_rating',
        'rank_trend',
        'issue_date',
        'pdflink',
    ];
}
