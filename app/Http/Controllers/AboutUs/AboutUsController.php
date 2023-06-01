<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Http\Controllers\Global\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $group = Group::where('name', 'about_us')->first();
        return view('admin.group.indexAboutUs', compact('group'));
    }
    public function editImage(Request $request)
    {
        $group = Group::find($request->group_id);
        ImageController::updateGroupImage($request);
        $group->gpTitles[0]->update([
            'title_en' => $request->menu_en,
            'title_th' => $request->menu_th,
            'title_ch' => $request->menu_ch,
        ]);
        return redirect()->route('aboutus.index');
    }
}
