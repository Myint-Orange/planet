<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;

class GeneralInformationController extends Controller
{
    public function index(){



        $type = Type::where('name', 'ir_basic_info')->first();
        $typeHistory = Type::where('name', 'history')->first();
        $group = Group::where('name', 'about_us')->first();
        $typeGpStructure = Type::where('name', 'groupstructure')->first();

        return view('user.investorRealtions.investor-relations-home',compact('type','group','typeHistory','typeGpStructure'));
    }
}
