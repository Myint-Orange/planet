<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\IRBanner;
use App\Models\Annualreport;
use Illuminate\Http\Request;

class AnnualReportInformationController extends Controller
{
    public function index(){

        $type = IRBanner::where('irtype', 'IRAnnualreport')->first();
        $annualreports= Annualreport::get();
        return view('user.investorRealtions.investor-relations-report',compact('type','annualreports'));
    }
}
