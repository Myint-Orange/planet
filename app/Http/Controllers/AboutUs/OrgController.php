<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'orgstructure')->first();
        return view('admin.aboutUs.orgstructure.index', compact('type'));
    }
    public function create()
    {
        return view('admin.aboutUs.orgstructure.create');
    }

    public function updateType(Request $request)
    {

        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'orgstructure')->first();

        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);

        $type->typeTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
            'group_id' => $group->id,
        ]);

        return redirect()->route('orgstructure.index');
    }

    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('orgstructure.update', $request->post_id);
    }

    public function updateDiagramImage(Request $request)
    {
        ImageController::updateTypeImages($request, 0, 'en', 'image_en');
        ImageController::updateTypeImages($request, 0, 'th', 'image_th');
        ImageController::updateTypeImages($request, 0, 'ch', 'image_ch');
        return redirect()->route('orgstructure.index');
    }
}
