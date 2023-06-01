<?php

namespace App\Http\Controllers\User\MainPage;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        $group = Group::where('name', 'mainpage')->first();
        $typeWelcome = Type::where('name', 'welcome')->first();
        $typeOurBus = Type::where('name', 'our_business')->first();
        $typeAward = Type::where('name', 'awards')->first();
        $typeContact = Type::where('name', 'get_in_touch')->first();
        $typeAddress = Type::where('name', 'address')->first();
        $activity = Type::where('name', 'activity')->first();
        $posts=$activity->posts;
      //  $posts = $posts->sortByDesc('created_at');
        $services = Type::where('name', 'services')->first();
        $businessTypes = Type::where('group_id',8)->first();
       // dd($posts[0]);



        return view('user.index', compact(['group', 'typeWelcome', 'typeOurBus', 'typeAward', 'typeContact', 'typeAddress', 'activity','services','businessTypes','posts']));
    }
}
