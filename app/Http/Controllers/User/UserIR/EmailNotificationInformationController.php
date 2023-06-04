<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use Illuminate\Http\Request;

class EmailNotificationInformationController extends Controller
{
    public function index(){
        
        $cities= City::all();
        return view('user.investorRealtions.investor-relations-newsletter',compact('cities'));
    }

    public function store(Request $request){
        $validation = $request->validate([
            'email' => 'required|email',
            'surname' => 'required',
            'country' => 'required',
            'occupation' => 'required',
            'jobposition' => 'required',
            'industry' => 'required',
            //'g-recaptcha-response' => 'required|captcha',
        ]);
        $useremailnotification_store = DB::table('useremailnotifications')->insert([
            'email' => $request->email,
            'surname' => $request->surname,
            'country' => $request->country,
            'occupation' => $request->occupation,
            'jobposition' => $request->jobposition,
            'industry' => $request->industry,
        ]);
        if($useremailnotification_store){
            return redirect()->route('user.emailnotification.index')
                    ->with('success', 'Email notification sent successfully');
        }

    }

}
