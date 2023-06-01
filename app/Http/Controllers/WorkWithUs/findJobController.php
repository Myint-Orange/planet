<?php

namespace App\Http\Controllers\WorkWithUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class findJobController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'findjob')->first();
        $typeContact = Type::where('name', 'contact')->first();

        return view('admin.workwithus.findjob.index', compact(['type', 'typeContact']));
    }
    public function create()
    {
        return view('admin.workwithus.findjob.create');
    }

    public function updateType(Request $request)
    {
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'work_with_us')->first();
        $type = Type::where('name', 'findjob')->first();
        $type->typeTitles[1]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);

        $type->typeTitles[0]->update([
            'title_en'  => $request->subTitle_en,
            'title_th'  => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
            'group_id' => $group->id,
        ]);



        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('findjob.index', compact('notification'));
    }

    public function destroyImage($img_id, $post_id)
    {
        ImageController::deletePostImageByImgId($img_id, 'name_en');
        return redirect()->route('findjob.update', $post_id);
    }
    public function store(Request $request)
    {
        // dd($request);
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'findjob')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "findjob",
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
            'title_en'  => $request->loca_en,
            'title_th'  => $request->loca_th,
            'title_ch' => $request->loca_ch,
            'post_id' => $post->id,
        ]);
        $content = Content::create([
            'content_en'  => $request->desc_en,
            'content_th'  => $request->desc_th,
            'content_ch' => $request->desc_ch,
            'post_id' => $post->id,
        ]);


        return redirect()->route('findjob.update', $post->id);
    }

    public function update($post_id)
    {
        $post = Post::find($post_id);


        return view('admin.workwithus.findjob.edit', compact('post'));
    }
    public function editContact(Request $request)
    {
        //  dd($request);
        $type = Type::find($request->type_content_id);
        //  dd($type);
        $type->typeTitles[1]->update([
            'title_th'  => $request->name_th,
            'title_en'  => $request->name_en,
            'title_ch'  => $request->name_ch,
            'type_id' => $type->id,
        ]);
        $type->typeTitles[2]->update([
            'title_en'  => $request->address_en,
            'title_th'  => $request->address_th,
            'title_ch' => $request->address_ch,
            'type_id' => $type->id,
        ]);
        $type->typeTitles[3]->update([
            'title_en'  => $request->phone,
            'title_th'  => $request->phone,
            'title_ch' => $request->phone,
            'type_id' => $type->id,
        ]);
        $type->typeTitles[4]->update([
            'title_en'  => $request->email,
            'title_th'  => $request->email,
            'title_ch' => $request->email,
            'type_id' => $type->id,
        ]);



        ImageController::updateTypeImage($request);
        return redirect()->route('findjob.index');
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
            'title_en'  => $request->loca_en,
            'title_th'  => $request->loca_th,
            'title_ch' => $request->loca_ch,
            'post_id' => $post->id,
        ]);
        $post->contents[0]->update([
            'content_en'  => $request->desc_en,
            'content_th'  => $request->desc_th,
            'content_ch' => $request->desc_ch,
            'post_id' => $post->id,
        ]);

        ImageController::updatePostImage($request);
        return redirect()->route('findjob.update', $post->id);
    }
    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('findjob.update', $request->post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if ($post != null) {
            ImageController::deleteImage($post);

            $post->delete();
        }

        return redirect()->route('findjob.index');
    }
}
