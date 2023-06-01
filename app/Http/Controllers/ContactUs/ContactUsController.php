<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\ContactForm;
use App\Models\ContantForm;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function indexContact()
    {
        $group = Group::where('name', 'contactus')->first();

        return view('admin.group.indexContact', compact('group'));
    }
    public function index()
    {
        $group = Group::where('name', 'contactus')->first();
        $typeAddress = Type::where('name', 'address')->first();
        $typeFollowUs = Type::where('name', 'followus')->first();
        $typeGetThere = Type::where('name', 'getthere')->first();
        $contantForms = ContactForm::all();
        return view('admin.contactUs.index', compact(['group', 'typeAddress', 'typeFollowUs', 'typeGetThere', 'contantForms']));
    }
    public function create()
    {
        return view('admin.contactUs.create');
    }
    public function editGetThere(Request $request)
    {
        //dd($request);
        $request->validate([
            'bts' => 'required',
            'bus' => 'required',

        ]);
        // $imageName = ImageController::updateTypeImage($request);
        $type = Type::find($request->type_id);
        $type->typeTitles[0]->update([
            'title_en' => $request->bts,
            'title_th' => $request->bts,
            'title_ch' => $request->bts,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->bus,
            'title_th' => $request->bus,
            'title_ch' => $request->bus,
        ]);


        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('contactus.index', compact('notification'));
    }
    public function editFollowUs(Request $request)
    {
        //  dd($request);
        $request->validate([
            'facebook' => 'required',
            'ig' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'line' => 'required',
        ]);
        // $imageName = ImageController::updateTypeImage($request);
        $type = Type::find($request->type_id);
        $type->typeTitles[0]->update([
            'title_en' => $request->facebook,
            'title_th' => $request->facebook,
            'title_ch' => $request->facebook,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->ig,
            'title_th' => $request->ig,
            'title_ch' => $request->ig,
        ]);
        $type->typeTitles[2]->update([
            'title_en' => $request->youtube,
            'title_th' => $request->youtube,
            'title_ch' => $request->youtube,
        ]);
        $type->typeTitles[3]->update([
            'title_en' => $request->twitter,
            'title_th' => $request->twitter,
            'title_ch' => $request->twitter,
        ]);
        $type->typeTitles[4]->update([
            'title_en' => $request->line,
            'title_th' => $request->line,
            'title_ch' => $request->line,
        ]);


        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('contactus.index', compact('notification'));
    }
    public function editAddress(Request $request)
    {

        $request->validate([
            'address_th' => 'required',
            'address_en' => 'required',
            'address_ch' => 'required',
        ]);
        // $imageName = ImageController::updateTypeImage($request);
        $type = Type::find($request->type_id);
        $type->typeTitles[0]->update([
            'title_en' => $request->name_en,
            'title_th' => $request->name_th,
            'title_ch' => $request->name_ch,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->address_en,
            'title_th' => $request->address_th,
            'title_ch' => $request->address_ch,
        ]);
        $type->typeTitles[2]->update([
            'title_en' => $request->telephone,
            'title_th' => $request->telephone,
            'title_ch' => $request->telephone,
        ]);
        $type->typeTitles[3]->update([
            'title_en' => $request->email,
            'title_th' => $request->email,
            'title_ch' => $request->email,
        ]);
        $type->typeTitles[4]->update([
            'title_en' => $request->latlong,
            'title_th' => $request->latlong,
            'title_ch' => $request->latlong,
        ]);


        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('contactus.index', compact('notification'));
    }

    public function updateTitle(Request $request)
    {
        $request->validate([
            'title_th' => 'required',
            'title_en' => 'required',
            'title_ch' => 'required',
        ]);
        $imageName = ImageController::updateGroupImage($request);
        $group = Group::find($request->group_id);
        $group->gpTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);

        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('contactus.indexContact');
    }

    public function destroyImage($img_id, $post_id)
    {
        ImageController::deletePostImageByImgId($img_id, 'name_en');
        return redirect()->route('contactus.update', $post_id);
    }
    public function store(Request $request)
    {
        //  dd($request);
        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'social')->first();
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
        ImageController::uploadVideo($request, $post, $imageName);
        return redirect()->route('contactus.update', $post->id);
    }

    public function update($post_id)
    {
        $post = Post::find($post_id);

        return view('admin.contactUs.edit', compact('post'));
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
        return redirect()->route('contactus.update', $post->id);
    }
    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('contactus.update', $request->post_id);
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

        return redirect()->route('contact.index');
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
