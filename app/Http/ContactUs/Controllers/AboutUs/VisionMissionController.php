<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisionMissionController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'vision')->first();
        $typeMission = Type::where('name', 'mission')->first();
        return view('admin.aboutUs.vision.index', compact(['type', 'typeMission']));
    }
    public function create()
    {
        return view('admin.aboutUs.vision.create');
    }

    public function updateVisionAndMission(Request $request)
    {
        $request->validate([
            'title_th' => 'required',
        ]);
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'vision')->first();
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);
        $notification = array(
            'message' => 'Vission and Mission Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('vision.index', compact('notification'));
    }
    public function updateVision(Request $request)
    {
        //  dd($request);
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',
            'content_th' => 'required',
            'content_en' => 'required',
            'content_ch' => 'required',
        ]);
        $imageName = ImageController::updateTypeImages($request, 0, 'en', 'image');
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'vision')->first();
        $type->typeTitles[1]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);
        $type->typeContents[0]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'type_id' => $type->id,
        ]);

        $notification = array(
            'message' => 'Vission Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vision.index', compact('notification'));
    }
    public function editMissionImage(Request $request)
    {
        //  dd($request);
        ImageController::updateTypeImage($request);
        return redirect()->route('vision.index');
    }


    public function store(Request $request)
    {
        $request->validate([

            'content_th' => 'required',

        ]);

        $type = Type::where('name', 'mission')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "mission",
            'user_id' => $user->id,
            'type_id' => $type->id,
        ]);

        $content = Content::create([
            'content_th' => $request->content_th,
            'content_en' => $request->content_en,
            'content_ch' => $request->content_ch,
            'post_id' => $post->id,
        ]);
        return redirect()->route('vision.index');
    }
    public function update($post_id)
    {
        $post = Post::find($post_id);
        return view('admin.aboutUs.vision.edit', compact('post'));
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->post_id);

        $post->contents[0]->update([
            'content_th' => $request->content_th,
            'content_en' => $request->content_en,
            'content_ch' => $request->content_ch,

        ]);
        return redirect()->route('vision.update', $post->id);
    }

    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('vision.update', $request->post_id);
    }
    public function destroyMission($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        $notification = array(
            'message' => 'Mission  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('vision.index');
    }
}
