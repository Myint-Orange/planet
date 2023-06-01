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
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'history')->first();
        return view('admin.aboutUs.history.index', compact('type'));
    }
    public function create()
    {
        return view('admin.aboutUs.history.create');
    }

    public function updateType(Request $request)
    {
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',
            'subTitle_th' => 'required',
            'subTitle_en' => 'required',
            'subTitle_ch' => 'required',
            'content_th' => 'required',
            'content_en' => 'required',
            'content_ch' => 'required',
        ]);
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'history')->first();
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
        return redirect()->route('history.index', compact('notification'));
    }
    public function updateObjective(Request $request)
    {
        $request->validate([
            'content_th' => 'required',
            'content_en' => 'required',
            'content_ch' => 'required',
        ]);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'history')->first();
        $imageName = ImageController::updateTypeImages($request, 0, 'en', 'image');
        $type->typeContents[1]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'group_id' => $group->id,
        ]);
        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('history.index', compact('notification'));
    }

    public function updateHistory(Request $request)
    {
        $request->validate([
            'content_th' => 'required',
            'content_en' => 'required',
            'content_ch' => 'required',
        ]);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'history')->first();
        $imageName = ImageController::updateTypeImages($request, 1, 'en', 'image');
        $type->typeContents[2]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'group_id' => $group->id,
        ]);
        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('history.index', compact('notification'));
    }

    public function updateConclusion(Request $request)
    {
        $request->validate([
            'content_th' => 'required',
            'content_en' => 'required',
            'content_ch' => 'required',
        ]);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'history')->first();
        $type->typeContents[3]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'group_id' => $group->id,
        ]);
        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('history.index', compact('notification'));
    }
    public function store(Request $request)
    {
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'history')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "groupstructure",
            'imgname' => $imageName,
            'user_id' => $user->id,
            'type_id' => $type->id,
        ]);
        $title = Title::create([
            'title_en'  => $request->title_en,
            'title_th'  => $request->title_th,
            'title_ch' => $request->title_ch,
            'post_id' => $post->id,
        ]);
        $subTitle = Title::create([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
            'post_id' => $post->id,
        ]);
        return redirect()->route('history.update', $post->id);
    }
    public function update($post_id)
    {
        $post = Post::find($post_id);
        //dd($post->contents);
        return view('admin.aboutUs.history.edit', compact('post'));
    }

    public function edit(Request $request)
    {
        //dd($request);
        $post = Post::find($request->post_id);
        $post->titles[0]->update([
            'title_th'  => $request->title_th,
            'title_en'  => $request->title_en,
            'title_ch'  => $request->title_ch,
            'post_id' => $post->id,
        ]);
        $post->titles[1]->update([
            'title_th'  => $request->subTitle_th,
            'title_en'  => $request->subTitle_en,
            'title_ch'  => $request->subTitle_ch,
            'post_id' => $post->id,
        ]);
        return redirect()->route('history.update', $post->id);
    }

    public function updateTypeContent(Request $request)
    {
        $request->validate([
            'content_th' => 'required',
            'content_en' => 'required',
            'content_ch' => 'required',
        ]);
        $imageName = ImageController::updateTypeImages($request, 0, 'en', 'image');
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'groupstructure')->first();
        $type->typeContents[0]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'type_id' => $type->id,
        ]);
        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('history.index', compact('notification'));
    }

    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('history.update', $request->post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        ImageController::deleteImage($post);
        $post->delete();
        return redirect()->route('history.index');
    }


    public function prepareUpdateDate($post, $lang)
    {
        $returnVal = null;
        $title = 'title_' . $lang;
        $content = 'content_' . $lang;
        $returnVal = array(
            'title' => $post->titles[0]->$title ?? "",
            'subTitle' => $post->titles[1]->$title ?? "",
            'content' => $post->contents[0]->$content ?? "",
        );

        return $returnVal;
    }
}
