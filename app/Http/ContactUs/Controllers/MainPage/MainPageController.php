<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $group = Group::where('name', 'mainpage')->first();

        return view('admin.group.indexMainPage', compact('group'));
    }
    public function editBanner(Request $request)
    {
        $group = Group::find($request->group_id);
        // dd("Arrive");
        $this->uploadMultiplePhotoGroup($request, $group);
        $group->gpTitles[1]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);
        $group->gpTitles[2]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
        ]);
        $group->gpTitles[3]->update([
            'title_en' => $request->menu_en,
            'title_th' => $request->menu_th,
            'title_ch' => $request->menu_ch,
        ]);
        return redirect()->route('mainpage.index');
    }
    public function welcomeIndex()
    {
        $type = Type::where('name', 'welcome')->first();
        return view('admin.mainPage.welcome.index', compact('type'));
    }
    public function editWelcomeTo(Request $request)
    {
        $type = Type::find($request->type_id);
        ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
        ]);
        $type->typeContents[0]->update([
            'content_en' => $request->content_en,
            'content_th' => $request->content_th,
            'content_ch' => $request->content_ch,
        ]);
        return redirect()->route('welcome.index');
    }
    public function serviceIndex(Request $request)
    {
        $type = Type::where('name', 'services')->first();

        return view('admin.mainPage.services.index', compact('type'));
    }
    public function servicesEdit(Request $request)
    {
        $type = Type::where('name', 'services')->first();
        $newName = ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
        ]);
        if ($request->youtube != null) {
            $type->vedioTypes[0]->update([
                'youtube' => $request->youtube,
            ]);
        }

        ImageController::updateVideoType($request);

        return redirect()->route('service.index');
    }
    public function destroyVedio(Request $request)
    {
        $typeId = $request->type_id;
        ImageController::deleteTypeVideo($typeId);
        return response()->json(['success' => true]);
    }
    public function destroyYouTubeLink(Request $request)
    {
        $typeId = $request->type_id;
        $type = Type::find($typeId);
        $type->vedioTypes[0]->update([
            'youtube' => null,
        ]);

        return response()->json(['success' => true]);
    }

    public function ourBusinessIndex()
    {
        $type = Type::where('name', 'our_business')->first();
        return view('admin.mainPage.ourbusiness.index', compact('type'));
    }
    public function awardsIndex()
    {
        $type = Type::where('name', 'awards')->first();
        return view('admin.mainPage.awards.index', compact('type'));
    }
    public function contactIndex()
    {
        $type = Type::where('name', 'get_in_touch')->first();
        return view('admin.mainPage.contact.index', compact('type'));
    }
    public function editOurBusiness(Request $request)
    {
        // dd($request);
        $type = Type::find($request->type_id);
        $newName = ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
        ]);
        $type->typeTitles[2]->update([
            'title_en' => $request->content_en,
            'title_th' => $request->content_th,
            'title_ch' => $request->content_ch,
        ]);
        return redirect()->route('ourBusiness.index');
    }
    public function editAwards(Request $request)
    {

        $type = Type::find($request->type_id);
        $newName = ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
        ]);

        return redirect()->route('awards.index');
    }
    public function editContact(Request $request)
    {
        // dd($request);
        $type = Type::find($request->type_id);
        $newName = ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_th,
            'title_ch' => $request->subTitle_ch,
        ]);
        $type->typeTitles[2]->update([
            'title_en' => $request->content_en,
            'title_th' => $request->content_th,
            'title_ch' => $request->content_ch,
        ]);
        return redirect()->route('contact.index');
    }
    public function destroyImage($img_id)
    {

        ImageController::deleteTypeImageByImgId($img_id, 'name_en');
        return response()->json(['success' => true]);
    }
    public function destroyImageGroup($img_id)
    {
        /// dd('Arrive delete group img');
        ImageController::deleteGroupImageByImgId($img_id, 'name_en');
        return response()->json(['success' => true]);
    }
    public function uploadMultiplePhoto($request, $type)
    {
        if ($request->images != null) {
            foreach ($request->images as $image) {

                ImageController::uploadTypeImages($image, $type->id);
            }
        }
    }
    public function uploadMultiplePhotoGroup($request, $group)
    {
        if ($request->images != null) {
            foreach ($request->images as $image) {
                ImageController::uploadGroupImages($image, $group->id);
            }
        }
    }
}
