<?php

namespace App\Http\Controllers\WorkWithUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkWithUsController extends Controller
{

    public function index()
    {
        $group = Group::where('name', 'work_with_us')->first();
        return view('admin.group.indexWorkwithus', compact('group'));
    }
    public function editGroup(Request $request)
    {

        $group = Group::find($request->group_id);
        $group->gpTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);
        $group->gpTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
        ]);
        $this->editImage($request);
        return redirect()->route('workwithus.index');
    }
    public function editImage(Request $request)
    {
        ImageController::updateGroupImage($request);
    }
}
