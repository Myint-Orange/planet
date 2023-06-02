<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class MangementDicussionInformationController extends Controller
{
    public function index(){
        $type = Type::where('name', 'ir_analysis')->first();
        return view('user.investorRealtions.investor-relations-financial-document',compact(['type']));
    }
}
