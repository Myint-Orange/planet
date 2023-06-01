<?php

namespace App\Http\Controllers\IR;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Post;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalysisController extends Controller
{
    public function index(){ 
        $type = Type::where('name', 'ir_analysis')->first();
        return view('admin.irpages.analysis.index', compact(['type']));
    }
    public function editBanner(Request $request)
    {
        $type = Type::find($request->type_id);
        ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->menu_en,
            'title_th' => $request->menu_th,
            'title_ch' => $request->menu_ch,
        ]);
      
        return redirect()->route('IRAnalysis.index');
    }
    public function createFile(Request $request){
      
        return view('admin.irpages.analysis.create');
    }
    public function storeFile(Request $request){
      //  dd("Arrive Analysis");
        $fileName= ImageController::uploadTypePDF($request);
        $type = Type::where('name', 'ir_analysis')->first();
        $yearDate = Carbon::createFromFormat('Y', $request->year)->startOfYear();
        $user = Auth::user();
        $post=Post::create([
             'imgname'=>$fileName,
             'name'=>$request->fileName,
             'created_at'=>$yearDate,
             'type_id'=>$type->id,
             'user_id'=>$user->id,
        ]);
        return redirect()->route('IRAnalysis.index');
    }
    public function destroyFile($post_id){
         $post=Post::find($post_id);
         ImageController::deletePdf($post);
         $post->delete();
         return redirect()->route('IRAnalysis.index');
    }
    public function updateFile($post_id){
        $post=Post::find($post_id);
        return view('admin.irpages.analysis.update',compact('post'));
    }

    public function editFile(Request $request){
      $post=Post::find($request->post_id);
      $fileName= ImageController::updatePdf($request);
      $yearDate = Carbon::createFromFormat('Y', $request->year)->startOfYear();   
      $user = Auth::user();
        $post->update([
            'imgname'=>$fileName,
            'name'=>$request->fileName,
            'created_at'=>$yearDate,
            'user_id'=>$user->id,
            ]);     
      return redirect()->route('IRAnalysis.updateFile',$post->id);

    }
  

}
