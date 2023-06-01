<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrideController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'pride')->first();

        return view('admin.aboutUs.pride.index', compact('type'));
    }
    public function create()
    {
        return view('admin.aboutUs.pride.create');
    }

    public function updateType(Request $request)
    {
        //dd($request);
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',
            'content_th' => 'required',
            'content_en' => 'required',
            'content_ch' => 'required',
        ]);
        // dd($request);
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'pride')->first();
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);

        $type->typeContents[0]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'content_id' => $group->id,
        ]);
        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pride.index', compact('notification'));
    }
    public function updateCertificateImage(Request $request)
    {
        //dd($request);
        ImageController::updateTypeImages($request, 0, 'en', 'image');
        return redirect()->route('pride.index');
    }

    public function editImage(Request $request)
    {
        ImageController::updateTypeImages($request, 0, 'en', 'image');
        return redirect()->route('pride.update', $request->post_id);
    }
}
