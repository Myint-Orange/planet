<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annualreport extends Model
{
    use HasFactory;
    protected $table = 'annualreports';
    protected $fillable = [
        'title',
        'image',
        'pdflink',
        'filesize',
    ];

}
