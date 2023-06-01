<?php

namespace App\Http\Controllers\User\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;

class UserCoreValueController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'corevalue')->first();
        return view('user.aboutus.corevalue', compact('type'));
    }
}
