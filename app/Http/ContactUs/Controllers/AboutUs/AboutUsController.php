<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Group;
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
        if ($request->image != null && $request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();
            // dd($newName);

            /// dd($group);
            $filename = public_path() . '/storage/groups/' . $group->imgname;
            if ($group->imgname != null && file_exists($filename)) {
                unlink($filename);
            }
            Storage::disk('public')->putFileAs('groups', $image, $newName);
            $user = Auth::user();
            //  dd($filename);
            $group->update([
                'imgname' => $newName,
                'user_id' => $user->id,
            ]);
        }
        $group->gpTitles[0]->update([
            'title_en' => $request->menu_en,
            'title_th' => $request->menu_th,
            'title_ch' => $request->menu_ch,
        ]);
        return redirect()->route('aboutus.index');
    }
}
