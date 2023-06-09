<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dividenddatalist extends Model
{
    use HasFactory;
    protected $fillable = ['markingdate', 'bookclosingdate', 'determiningdate', 'paymentdate', 'dividendpershare', 'unit', 'turnovercyclefrom', 'turnovercycleto', 'dividendsfrom'];
}
