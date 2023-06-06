<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShareholdermeetingInformationController extends Controller
{
    public function index(){

      $type = DB::table('irbanners')->where('irtype', 'IRShareHolderMeeting')->first();

      $all_data =DB::table('shareholdermeetings')->get();
      $invitationletters =DB::table('shareholdermeetings')->where('type', 'Invitation_letter')->get();
      $attachmentposts = DB::table('shareholdermeetings')->where('type','Attachement')->get();
      $criteriaposts = DB::table('shareholdermeetings')->where('type','Criteria')->get();
        return view('user.investorRealtions.investor-relations-shareholder-meeting', compact('type','invitationletters','all_data','attachmentposts','criteriaposts'));
    }
}
