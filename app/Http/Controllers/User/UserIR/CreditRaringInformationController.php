<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreditRaringInformationController extends Controller
{
    public function index(){

      $type = DB::table('irbanners')->where('irtype', 'IRCreditRating')->first();
      $posts =DB::table('creditratings')->get();
      return view('user.investorRealtions.investor-relations-credit', compact('type','posts'));
    }
}
