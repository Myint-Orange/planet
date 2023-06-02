<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class ShareHolderStructureInformationController extends Controller
{
    public function index(){

        $type = Type::where('name', 'ir_shareholder')->first();
        return view('user.investorRealtions.investor-relations-shareholder', compact(['type']));
    }
}
