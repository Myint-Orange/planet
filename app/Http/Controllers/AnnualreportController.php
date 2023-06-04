<?php

namespace App\Http\Controllers;

use App\Models\Annualreport;
use App\Models\IRBanner;
use App\Models\City;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class AnnualreportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        //$type = Type::where('name', 'ir_analysis')->first();
        $type= IRBanner::where('irtype', 'IRAnnualreport')->first();
        $annualreports = Annualreport::get();

        $posts = City::get();
        return view('admin.irpages.annualreport.index', compact('type','annualreports'));
    }

    public function store(Request $request){
        $irBanner = new IRBanner();
        $irBanner->name_en = $request->menu_en;
        $irBanner->name_th = $request->menu_th;
        $irBanner->name_ch = $request->menu_ch;
        $irBanner->irtype = "IRAnnualreport";
        $irBanner->save();

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('user.annualReport.index');
    }
    public function editBanner(Request $request){
        $type = IRBanner::where('irtype', 'IRAnnualreport')->where('id', $request->id)->first();
        if($request->image != null && $request->hasFile('image')){
            $filename = str_replace('/embryo-planet/public', '', public_path('/images/'));
            $filename =  $filename . $type->image;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $type->image = $imageName;
            $type->save();
        }
        $type->update([
            'name_en' => $request->menu_en,
            'name_th' => $request->menu_th,
            'name_ch' => $request->menu_ch,
        ]);
        return redirect()->route('user.annualReport.index');

    }
    public function createFile(Request $request){
      
        return view('admin.irpages.annualreport.create');
    }
    public function storeFile(Request $request){
        
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'required|mimes:pdf|max:2048',
            'name' => 'required',
        ]);
        $annual_report = new Annualreport();
        $pdf = $request->file('pdf');
        $sizeInMB = round($pdf->getSize() / (1024 * 1024), 2);
        $annual_report->title = $request->name;
        $annual_report->pdflink = $pdf->getClientOriginalName();
        $annual_report->filesize = $sizeInMB;
        $pdfName = $pdf->getClientOriginalName();
        $pdf->move(public_path('images'), $pdfName);
        $annual_report->pdflink = $pdfName;
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $annual_report->image = $imageName;
        $annual_report->save();
        return redirect()->route('user.annualReport.index');
    }
    public function destroyFile($post_id){
    }
    public function updateFile($post_id){
        return view('admin.irpages.irfinancial.update',compact('post'));
    }

    public function editFile(Request $request){
    //   $post=Post::find($request->post_id);
    //   $fileName= ImageController::updatePdf($request);
    //   $yearDate = Carbon::createFromFormat('Y', $request->year)->startOfYear();   
    //   $user = Auth::user();
    //     $post->update([
    //         'imgname'=>$fileName,
    //         'name'=>$request->fileName,
    //         'created_at'=>$yearDate,
    //         'user_id'=>$user->id,
    //         ]);     
      //return redirect()->route('IRFinancial.updateFile',$post->id);

    }
}
