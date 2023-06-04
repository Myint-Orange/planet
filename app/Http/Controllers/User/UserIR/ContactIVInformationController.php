<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\IRBanner;
use App\Models\Ircontact;
use Illuminate\Http\Request;

class ContactIVInformationController extends Controller
{
    public function index(){

        $type= IRBanner::where('irtype', 'IRContact')->first();
        $inContact = Ircontact::first();
        return view('user.investorRealtions.investor-relations-contact',compact('type','inContact'));
    }
}
