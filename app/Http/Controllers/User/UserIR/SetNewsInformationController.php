<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\IRBanner;
use App\Models\Irnews;
use App\Models\Type;
use Illuminate\Http\Request;

class SetNewsInformationController extends Controller
{
    public function index(){

        $type= IRBanner::where('irtype', 'IRNews')->first();
        $inContacts = Irnews::get();
        return view('user.investorRealtions.investor-relations-setnews',compact('type','inContacts'));
    }
    public function search(Request $request){
        
        $created =$request->created;
        $headline = $request->headline;

        $type= IRBanner::where('irtype', 'IRNews')->first();
        if($created == null && $headline == null){
            $inContacts = Irnews::get();
            return view('user.investorRealtions.investor-relations-setnews',compact('type','inContacts'));
        }
        if($created!= null && $headline!= null){
            $inContacts = Irnews::where('created', $created)->where('headline', $headline)->get();
            return view('user.investorRealtions.investor-relations-setnews',compact('type','inContacts'));
        }
        if($headline!= null){
            $inContacts = Irnews::where('headline', $headline)->get();
            return view('user.investorRealtions.investor-relations-setnews',compact('type','inContacts'));
        }
        if($created!= null){
            $inContacts = Irnews::where('created', $created)->get();
            return view('user.investorRealtions.investor-relations-setnews',compact('type','inContacts'));
        }
        return view('user.investorRealtions.investor-relations-setnews',compact('type','inContacts'));

    }}
