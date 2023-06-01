<?php

namespace App\Http\Controllers\IR;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BasicInfoController extends Controller
{
    public function index(){
      
        $type = Type::where('name', 'ir_basic_info')->first();
        $group = Group::where('name', 'about_us')->first();
        return view('admin.irpages.indexBasicInfo', compact(['group','type']));
    }
    public function edit(Request $request)
    {
        $type = Type::find($request->type_id);
        ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->menu_en,
            'title_th' => $request->menu_th,
            'title_ch' => $request->menu_ch,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->subTitle_en,
            'title_th' => $request->subTitle_en,
            'title_ch' => $request->subTitle_en,
        ]);
        return redirect()->route('IRBasicInfo.index');
    }
}
