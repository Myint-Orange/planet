<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DividendpolicyandpaymentInformationController extends Controller
{
    public function index(){

        $type = DB::table('irbanners')->where('irtype', 'Dividendpolicy')->first();
        $dividendDataLists = DB::table('dividenddatalists')->get();
        $dividendpolicyandpayment = DB::table('dividendpolicyandpayments')->first();
        return view('user.investorRealtions.investor-relations-dividend-information',compact('type', 'dividendDataLists', 'dividendpolicyandpayment'));
    }
}
