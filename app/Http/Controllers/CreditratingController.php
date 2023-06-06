<?php

namespace App\Http\Controllers;

use App\Models\Creditrating;
use App\Models\Irnews;
use App\Models\IRBanner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CreditratingController extends Controller
{

    public function indexs(){
        $type = DB::table('irbanners')->where('irtype', 'IRCreditRating')->first();
        $posts =DB::table('creditratings')->get();
        
        return view('admin.irpages.ircreditrating.index', compact('type','posts'));
    }
    public function stored(Request $request){
        $irBanner = new IRBanner();
        $irBanner->name_en = $request->menu_en;
        $irBanner->name_th = $request->menu_th;
        $irBanner->name_ch = $request->menu_ch;
        $irBanner->irtype = "IRCreditRating";
        $irBanner->save();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('creditrating.index');
    }

    public function editBanner(Request $request){
        $type = IRBanner::where('irtype', 'IRCreditRating')->where('id', $request->type_id)->first();
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
        return redirect()->route('creditrating.index');

    }
    public function index()
    {
        $posts =DB::table('creditratings')->get();
        $type = DB::table('irbanners')->where('irtype', 'IRCreditRating')->first();
        $posts =DB::table('creditratings')->get();
       return view('admin.irpages.ircreditrating.index', compact('type','posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.irpages.ircreditrating.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'credit_type' => 'required',
            'rating_agency' => 'required',
            'credit_rating' => 'required',
            'rank_trend' => 'required',
            'issue_date' => 'required',
            'pdflink' =>'required',
        ]);
        $credit_rating = new Creditrating();
        $credit_rating->credit_type = $request->credit_type;
        $credit_rating->rating_agency = $request->rating_agency;
        $credit_rating->credit_rating = $request->credit_rating;
        $credit_rating->rank_trend = $request->rank_trend;
        $credit_rating->issue_date = $request->issue_date;
        $pdf = $request->file('pdflink');
        $credit_rating->pdflink = $pdf->getClientOriginalName();
        $pdfName = $pdf->getClientOriginalName();
        $pdf->move(public_path('images'), $pdfName);
        $credit_rating->pdflink = $pdfName;
        $credit_rating->save();
        if($credit_rating){
            return redirect()->route('creditrating.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Irnews $irnews)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Irnews $irnews)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Irnews $irnews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Irnews $irnews)
    {
        //
    }
}
