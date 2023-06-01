<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseInformationController extends Controller
{
    public function index(){
        return view('user.investorRealtions.investor-relations-purchase');
    }
}
