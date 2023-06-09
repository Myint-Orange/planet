<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\IRBanner;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseInformationController extends Controller
{
    public function index(){
        
        $type = IRBanner::where('irtype', 'IRNews')->first();
        $inContacts = Purchase::get();
        return view('user.investorRealtions.investor-relations-purchase', compact('type', 'inContacts'));
    }
}
