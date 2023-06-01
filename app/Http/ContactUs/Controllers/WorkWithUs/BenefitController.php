<?php

namespace App\Http\Controllers\WorkWithUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BenefitController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'benefit')->first();

        return view('admin.workwithus.benefit.index', compact('type'));
    }
    public function create()
    {
        return view('admin.workwithus.benefit.create');
    }

    public function updateType(Request $request)
    {
        /*  $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',

        ]);*/
        //dd($request);
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'work_with_us')->first();
        $type = Type::where('name', 'benefit')->first();
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);

        $type->typeTitles[1]->update([
            'title_en'  => $request->subTitle_en,
            'title_th'  => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
            'group_id' => $group->id,
        ]);

        $type->typeTitles[2]->update([
            'title_en'  => $request->postTitle_en,
            'title_th'  => $request->postTitle_th,
            'title_ch' => $request->postTitle_ch,
            'group_id' => $group->id,
        ]);

        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('benefit.index', compact('notification'));
    }

    public function destroyImage($img_id, $post_id)
    {
        ImageController::deletePostImageByImgId($img_id, 'name_en');
        return redirect()->route('benefit.update', $post_id);
    }
    public function store(Request $request)
    {
        // dd($request);
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'benefit')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "benefit",
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


        return redirect()->route('benefit.update', $post->id);
    }

    public function update($post_id)
    {
        $post = Post::find($post_id);

        return view('admin.workwithus.benefit.edit', compact('post'));
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

        ImageController::updatePostImage($request);


        return redirect()->route('benefit.update', $post->id);
    }




    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('benefit.update', $request->post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if ($post != null) {
            ImageController::deleteImage($post);

            $post->delete();
        }

        return redirect()->route('benefit.index');
    }
}
