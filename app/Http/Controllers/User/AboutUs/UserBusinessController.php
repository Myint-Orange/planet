<?php

namespace App\Http\Controllers\User\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;

class UserBusinessController extends Controller
{
    public function businessType($type_id)
    {
        $type = Type::find($type_id);
        $group = Group::where('name', 'business_group')->first();
        $gpTitle = $group->gpTitles[0];
        return view('user.ourbusiness.business', compact(['type', 'gpTitle']));
    }
}
