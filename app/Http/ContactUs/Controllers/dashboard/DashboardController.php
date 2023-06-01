<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        session()->put('groups', $groups);
        return view('admin.index');
    }
}
