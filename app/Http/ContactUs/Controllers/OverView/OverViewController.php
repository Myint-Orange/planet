<?php

namespace App\Http\Controllers\OverView;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Type;
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

        return view(
            'admin.overview.index',
            compact(['typeHistory', 'typeCoreValue', 'typeOrgStructure', 'typeGpStructure', 'typeNetwork', 'typeAward', 'typeVision'])
        );
    }
    public function editHistory(Request $request)
    {
        $type = Type::find($request->type_id);
        ImageController::updateTypeImages($request, count($type->typeImages) - 1, 'en', 'image');
        return redirect()->route('overview.index');
    }
    public function editCoreValue(Request $request)
    {
    }
    public function editGroupStructure(Request $request)
    {
    }
    public function editEmbryoNetwork(Request $request)
    {
    }
    public function editOrgStructure(Request $request)
    {
    }
    public function editAward(Request $request)
    {
    }
}
