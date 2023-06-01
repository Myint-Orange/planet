<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditRaringInformationController extends Controller
{
    public function index(){
        return view('user.investorRealtions.investor-relations-credit');
    }
}
