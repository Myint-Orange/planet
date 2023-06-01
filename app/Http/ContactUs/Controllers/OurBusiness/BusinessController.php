<?php

namespace App\Http\Controllers\OurBusiness;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use App\Models\TypeContent;
use App\Models\TypeTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index()
    {
        $group = Group::where('name', 'business_group')->first();

        return view('admin.businessGroup.business.index', compact('group'));
    }
    public function create()
    {
        return view('admin.businessGroup.business.create');
    }



    public function destroyImage($img_id, $post_id)
    {
        ImageController::deletePostImageByImgId($img_id, 'name_en');
        return redirect()->route('business.update', $post_id);
    }
    public function store(Request $request)
    {
        //dd($request);
        $imageName = ImageController::uploadImage($request);
        $group = Group::where('name', 'business_group')->first();
        $user = Auth::user();
        $type = Type::create([
            'name' => 'business',
            'imgname' => $imageName,
            'user_id' => $user->id,
            'group_id' => $group->id,
        ]);
        $title = TypeTitle::create([
            'title_en'  => $request->title_en,
            'title_th'  => $request->title_th,
            'title_ch' => $request->title_ch,
            'type_id' => $type->id,
        ]);
        $content = TypeContent::create([
            'content_en'  => $request->content_en,
            'content_th'  => $request->content_th,
            'content_ch' => $request->content_ch,
            'type_id' => $type->id,
        ]);
        ImageController::uploadTypeImage($type, $request);
        return redirect()->route('business.update', $type->id);
    }

    public function update($type_id)
    {
        $type = Type::find($type_id);

        return view('admin.businessGroup.business.edit', compact('type'));
    }

    public function edit(Request $request)
    {


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
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('business.update', $type->id);
    }




    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('businesss.update', $request->post_id);
    }
    public function destroy($type_id)
    {
        $type = Type::find($type_id);

        if ($type != null) {
            ImageController::deleteTypeImage($type->id, 'imgname');

            $type->delete();
        }

        return redirect()->route('business.index');
    }
    public function uploadMultiplePhoto($request, $post_id)
    {
        foreach ($request->images as $image) {
            ImageController::uploadPostImage($image, $post_id);
        }
    }
}
