<?php

namespace App\Http\Controllers\OurBusiness;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessPostController extends Controller
{
    public function index($type_id)
    {
        $type = Type::find($type_id);

        return view('admin.businessGroup.businesspost.index', compact('type'));
    }
    public function create($type_id)
    {
        $type = Type::find($type_id);
        return view('admin.businessGroup.businesspost.create', compact('type'));
    }

    public function updateType(Request $request)
    {
        //  dd($request);
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',
            'content_th' => 'required',
            'content_ch' => 'required',
            'content_en' => 'required',

        ]);

        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'business_group')->first();
        $type = Type::find($request->type_id);
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
            'group_id' => $group->id,
        ]);

        $notification = array(
            'message' => 'Type Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('businesspost.index', $type->id);
    }


    public function store(Request $request)
    {
        //dd($request);
        $imageName = ImageController::uploadImage($request);
        $type = Type::find($request->type_id);
        $user = Auth::user();
        $post = Post::create([
            'name' => "social",
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

        return redirect()->route('businesspost.update', [$post->id, $type->id]);
    }

    public function update($post_id, $type_id)
    {
        $type = Type::find($type_id);
        $post = Post::find($post_id);

        return view('admin.businessGroup.businesspost.edit', compact(['post', 'type']));
    }

    public function edit(Request $request)
    {

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
        $post->contents[0]->update([
            'content_th'  => $request->content_th,
            'content_en'  => $request->content_en,
            'content_ch'  => $request->content_ch,
            'post_id' => $post->id,
        ]);
        ImageController::updatePostImage($request);
        ImageController::updateVideo($request);

        return redirect()->route('businesspost.update', [$post->id, $request->type_id]);
    }




    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('businesspost.update', $request->post_id);
    }
    public function destroy($post_id, $type_id)
    {
        $post = Post::find($post_id);

        if ($post != null) {
            ImageController::deleteImage($post);
            $post->delete();
        }
        return redirect()->route('businesspost.index', $type_id);
    }
}
