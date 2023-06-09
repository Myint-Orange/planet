<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialInformationController extends Controller
{
    public function index()
    {


        $type = DB::table('irbanners')->where('irtype', 'Finicialinformation')->first();
        $financialinformations = DB::table('financialinformations')->get();
        return view('user.investorRealtions.investor-relations-financial-info', compact('type', 'financialinformations'));
    }
}
