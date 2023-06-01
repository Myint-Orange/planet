<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Global\ImageController;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class CoreValueController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'corevalue')->first();
        $posts = $type->posts()->orderBy('created_at', 'desc')->get();
        return view('admin.aboutUs.corevalue.index', compact(['type', 'posts']));
    }
    public function create()
    {
        return view('admin.aboutUs.corevalue.create');
    }

    public function updateType(Request $request)
    {
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',
        ]);
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'corevalue')->first();

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
        return redirect()->route('corevalue.index', compact('notification'));
    }
    public function store(Request $request)
    {
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'corevalue')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "corevalue",
            'created_at' => $request->created_at,
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
        $content = Content::create([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'post_id' => $post->id,
        ]);

        return redirect()->route('corevalue.update', $post->id);
    }
    public function update($post_id)
    {
        $post = Post::find($post_id);
        $value_th = $this->prepareUpdateDate($post, 'th');
        $value_en = $this->prepareUpdateDate($post, 'en');
        $value_ch = $this->prepareUpdateDate($post, 'ch');

        return view('admin.aboutUs.corevalue.edit', compact(['value_th', 'value_en', 'value_ch', 'post']));
    }

    public function edit(Request $request, $lang)
    {
        //  dd("ddgdfgdfg");
        ImageController::updatePostImage($request);
        $post = Post::find($request->post_id);
        $post->update([
            'created_at' => $request->created_at,
        ]);
        $post->titles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'post_id' => $post->id,
        ]);
        $post->titles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
            'post_id' => $post->id,
        ]);
        $post->contents[0]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
            'post_id' => $post->id,
        ]);
        return redirect()->route('corevalue.update', $post->id);
    }

    public function editImage(Request $request)
    {

        return redirect()->route('corevalue.update', $request->post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        //dd($post);
        if ($post != null) {
            ImageController::deleteImage($post);
            ImageController::deletePostImage($post->id, 0, 'name_en');
            $post->delete();
        }

        return redirect()->route('corevalue.index');
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
