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

class InterestController extends Controller
{

    public function index()
    {
        $type = Type::where('name', 'interest')->first();
        return view('admin.knowledge.interest.index', compact('type'));
    }
    public function create()
    {
        return view('admin.knowledge.interest.create');
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
        $type = Type::where('name', 'interest')->first();
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
        return redirect()->route('interest.index', compact('notification'));
    }

    public function destroyImage($img_id, $post_id)
    {
        ImageController::deletePostImageByImgId($img_id, 'name_en');
        return redirect()->route('interest.update', $post_id);
    }
    public function store(Request $request)
    {
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'interest')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "interest",
            'imgname' => $imageName,
            'created_at' => $request->date,
            'user_id' => $user->id,
            'type_id' => $type->id,
        ]);
        $title = Title::create([
            'title_en'  => $request->desc_en,
            'title_th'  => $request->desc_th,
            'title_ch' => $request->desc_ch,
            'post_id' => $post->id,
        ]);
        $title = Title::create([
            'title_en'  => $request->title_en,
            'title_th'  => $request->title_th,
            'title_ch' => $request->title_ch,
            'post_id' => $post->id,
        ]);

        $content = Content::create([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'post_id' => $post->id,
        ]);
        //  dd($post);

        //   $this->uploadMultiplePhoto($request, $post->id);
        return redirect()->route('interest.update', $post->id);
    }

    public function update($post_id)
    {
        $post = Post::find($post_id);

        return view('admin.knowledge.interest.edit', compact('post'));
    }

    public function edit(Request $request)
    {
        //dd($request);

        $post = Post::find($request->post_id);
        $post->update([
            "created_at" => $request->date,
        ]);
        $post->titles[0]->update([
            'title_th'  => $request->title_th,
            'title_en'  => $request->title_en,
            'title_ch'  => $request->title_ch,
            'post_id' => $post->id,
        ]);
        $post->contents[0]->update([
            'content_th'  => $request->content_th,
            'content_en'  => $request->content_en,
            'content_ch'  => $request->content_ch,
            'post_id' => $post->id,
        ]);
        $post->titles[1]->update([
            'title_th'  => $request->desc_th,
            'title_en'  => $request->desc_en,
            'title_ch'  => $request->desc_ch,
            'post_id' => $post->id,
        ]);
        ImageController::updatePostImage($request);
        //  $this->uploadMultiplePhoto($request, $post->id);
        return redirect()->route('interest.update', $post->id);
    }

    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('interest.update', $request->post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if ($post != null) {
            ImageController::deleteImage($post);
            ImageController::deletePostImage($post->id, 0, 'name_en');
            $post->delete();
        }

        return redirect()->route('interest.index');
    }



    public function uploadMultiplePhoto($request, $post_id)
    {
        foreach ($request->images as $image) {
            ImageController::uploadPostImage($image, $post_id);
        }
    }
}
