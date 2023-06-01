<?php

namespace App\Http\Controllers\Knowledge;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'social')->first();

        return view('admin.knowledge.social.index', compact('type'));
    }
    public function create()
    {
        return view('admin.knowledge.social.create');
    }

    public function updateType(Request $request)
    {
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',

        ]);

        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'knowledge')->first();
        $type = Type::where('name', 'social')->first();
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);

        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('social.index', compact('notification'));
    }

    public function destroyImage($img_id, $post_id)
    {
        ImageController::deletePostImageByImgId($img_id, 'name_en');
        return redirect()->route('social.update', $post_id);
    }
    public function store(Request $request)
    {
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'social')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "social",
            'imgname' => $imageName,
            'created_at' => $request->created_at,
            'user_id' => $user->id,
            'type_id' => $type->id,
        ]);
        $title = Title::create([
            'title_en'  => $request->title_en,
            'title_th'  => $request->title_th,
            'title_ch' => $request->title_ch,
            'post_id' => $post->id,
        ]);
        $title = Title::create([
            'title_en'  => $request->subTitle_en,
            'title_th'  => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
            'post_id' => $post->id,
        ]);

        $content = Content::create([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'post_id' => $post->id,
        ]);

        ImageController::uploadVideo($request, $post, $imageName);
        return redirect()->route('social.update', $post->id);
    }


    public function update($post_id)
    {
        $post = Post::find($post_id);

        return view('admin.knowledge.social.edit', compact('post'));
    }

    public function edit(Request $request)
    {

        $post = Post::find($request->post_id);

        $post->update([
            'created_at' => $request->created_at,
        ]);
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
        $post->contents[0]->update([
            'content_th'  => $request->content_th,
            'content_en'  => $request->content_en,
            'content_ch'  => $request->content_ch,
            'post_id' => $post->id,
        ]);
        ImageController::updatePostImage($request);
        //  ImageController::updateVideo($request);
        if ($request->youtube != null) {
            $post = Post::find($request->post_id);
            ImageController::deleteVideoFile($post->id);
            $post->vedios[0]->update([
                "name" => null,
                "youtube" => $request->youtube,
            ]);
        }
        if ($request->video != null) {
            $post = Post::find($request->post_id);
            $fileName = ImageController::updateVideo($request);
            $post->vedios[0]->update([
                "name" => $fileName,
                "youtube" => null,
            ]);
        }
        return redirect()->route('social.update', $post->id);
    }
    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('social.update', $request->post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if ($post != null) {
            ImageController::deleteImage($post);
            ImageController::deletePostImage($post->id, 0, 'name_en');
            ImageController::deleteVideo($post->id);
            $post->delete();
        }

        return redirect()->route('social.index');
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
    public function uploadMultiplePhoto($request, $post_id)
    {
        foreach ($request->images as $image) {
            ImageController::uploadPostImage($image, $post_id);
        }
    }
}
