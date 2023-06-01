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

class GroupStructureController extends Controller
{
    public function index()
    {
        $type = Type::where('name', 'groupstructure')->first();
        $typeDiagram = Type::where('name', 'diagram')->first();

        return view('admin.aboutUs.groupstructure.index', compact(['type', 'typeDiagram']));
    }
    public function create()
    {
        return view('admin.aboutUs.groupstructure.create');
    }

    public function updateType(Request $request)
    {
        //dd("Arrive");
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'groupstructure')->first();

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
        return redirect()->route('groupstructure.index');
    }
    public function updateTypeDiagram(Request $request)
    {
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',
            'subTitle_th' => 'required',
            'subTitle_en' => 'required',
            'subTitle_ch' => 'required',
        ]);


       
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'diagram')->first();

        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);

        $type->typeTitles[1]->update([
            'title_th' => $request->subTitle_th,
            'title_en' => $request->subTitle_en,
            'title_ch' => $request->subTitle_ch,
            'group_id' => $group->id,
        ]);
        ImageController::updateTypeImages($request, 0, 'en', 'image_en');
        ImageController::updateTypeImages($request, 0, 'th', 'image_th');
        ImageController::updateTypeImages($request, 0, 'ch', 'image_ch');

      
        return redirect()->route('groupstructure.index');
    }
    public function store(Request $request)
    {
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'groupstructure')->first();
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
        return redirect()->route('groupstructure.update', $post->id);
    }
    public function update($post_id)
    {
        $post = Post::find($post_id);
        return view('admin.aboutUs.groupstructure.edit', compact('post'));
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

        return redirect()->route('groupstructure.update', $post->id);
    }


    public function updateTypeContent(Request $request)
    {
        $request->validate([
            'contentEnd_en' => 'required',
            'contentEnd_th' => 'required',
            'contentEnd_ch' => 'required',
        ]);
        $imageName = ImageController::updateTypeImages($request, 0, 'en', 'image');
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'groupstructure')->first();
        $type->typeContents[1]->update([
            'content_en' => $request->contentEnd_en,
            'content_th' => $request->contentEnd_th,
            'content_ch' => $request->contentEnd_ch,
            'type_id' => $type->id,
        ]);

        return redirect()->route('groupstructure.index');
    }
    public function updateChartImage(Request $request)
    {
        ImageController::updateTypeImages($request, 1, 'en', 'image_en');
        ImageController::updateTypeImages($request, 1, 'th', 'image_th');
        ImageController::updateTypeImages($request, 1, 'ch', 'image_ch');
        return redirect()->route('groupstructure.index');
    }



    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('groupstructure.update', $request->post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        ImageController::deleteImage($post);
        $post->delete();
        return redirect()->route('groupstructure.index');
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
