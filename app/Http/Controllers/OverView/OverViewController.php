<?php

namespace App\Http\Controllers\OverView;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Type;
use App\Models\Group;
use Illuminate\Http\Request;

class OverViewController extends Controller
{
    public  function index()
    {

        $typeVision = Type::where('name', 'vision')->first();
        $typeAward = Type::where('name', 'pride')->first();
        $typeNetwork = Type::where('name', 'network')->first();
        $typeGpStructure = Type::where('name', 'groupstructure')->first();
        $typeOrgStructure = Type::where('name', 'orgstructure')->first();
        $typeCoreValue = Type::where('name', 'corevalue')->first();
        $typeHistory = Type::where('name', 'history')->first();
        $typeOverView = Type::where('name', 'overview')->first();

        return view(
            'admin.overview.index',
            compact(['typeHistory', 'typeCoreValue', 'typeOrgStructure', 'typeGpStructure', 'typeNetwork', 'typeAward', 'typeVision','typeOverView'])
        );
    }
    public function editTypeOverView(Request $request){
        $type=Type::find($request->type_id);
        ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
    
    public function editHistory(Request $request)
    {
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        $type->typeContents[4]->update([
            'content_th'=>$request->caption_th,
            'content_en'=>$request->caption_en,
            'content_ch'=>$request->caption_ch
        ]);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
    public function editCoreValue(Request $request)
    {
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        $type->typeContents[1]->update([
            'content_th'=>$request->caption_th,
            'content_en'=>$request->caption_en,
            'content_ch'=>$request->caption_ch
        ]);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
    public function editGroupStructure(Request $request)
    {
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        $type->typeContents[2]->update([
            'content_th'=>$request->caption_th,
            'content_en'=>$request->caption_en,
            'content_ch'=>$request->caption_ch
        ]);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
    public function editEmbryoNetwork(Request $request)
    {  
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        $type->typeContents[1]->update([
            'content_th'=>$request->caption_th,
            'content_en'=>$request->caption_en,
            'content_ch'=>$request->caption_ch
        ]);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
    public function editOrgStructure(Request $request)
    {    
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        $type->typeContents[1]->update([
            'content_th'=>$request->caption_th,
            'content_en'=>$request->caption_en,
            'content_ch'=>$request->caption_ch
        ]);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
    public function editAward(Request $request)
    {   
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        $type->typeContents[1]->update([
            'content_th'=>$request->caption_th,
            'content_en'=>$request->caption_en,
            'content_ch'=>$request->caption_ch
        ]);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
    public function editVision(Request $request)
    {   
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        $type->typeContents[1]->update([
            'content_th'=>$request->caption_th,
            'content_en'=>$request->caption_en,
            'content_ch'=>$request->caption_ch
        ]);
        $type->typeTitles[0]->update([
            'title_th'=>$request->title_th,
            'title_en'=>$request->title_en,
            'title_ch'=>$request->title_ch
        ]);
        return redirect()->route('overview.index');
    }
}
