<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dividendpolicyandpayment extends Model
{
    use HasFactory;
    protected $table = 'dividendpolicyandpayments';
        protected $fillable = [
            'name_en','name_th','name_ch','description_en','description_th','description_ch'
        ];
}
