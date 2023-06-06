<?php

namespace App\Http\Controllers;

use App\Models\Irnews;
use App\Models\IRBanner;
use App\Models\Purchase;
use App\Models\Shareholdermeeting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShareholdermeetingController extends Controller
{

    public function indexs()
    {
        $type = DB::table('irbanners')->where('irtype', 'ShareHolderMeeting')->first();
        $posts = DB::table('shareholdermeetings')->get();
        return view('admin.irpages.shareholdermeeting.index', compact('type', 'posts'));
    }
    
    public function storeBanner(Request $request)
    {
        $irBanner = new IRBanner();
        $irBanner->name_en = $request->menu_en;
        $irBanner->name_th = $request->menu_th;
        $irBanner->name_ch = $request->menu_ch;
        $irBanner->irtype = "ShareHolderMeeting";
        $irBanner->save();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('shareholdermeeting.index');
    }

    public function editBanner(Request $request)
    {
        $type = IRBanner::where('irtype', 'ShareHolderMeeting')->where('id', $request->type_id)->first();
        if ($request->image != null && $request->hasFile('image')) {
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
        return redirect()->route('purchase.index');
    }
    public function index()
    {
        $type = DB::table('irbanners')->where('irtype', 'ShareHolderMeeting')->first();
        $posts = DB::table('shareholdermeetings')->get();
        return view('admin.irpages.shareholdermeeting.index', compact('type', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.irpages.shareholdermeeting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'pdflink' => 'required',
        ]);
        $purhcase = new Shareholdermeeting();
        $purhcase->name = $request->name;
        $purhcase->type = "Invitation_letter";
        $pdf = $request->file('pdflink');
        $purhcase->pdflink = $pdf->getClientOriginalName();
        $pdfName = $pdf->getClientOriginalName();
        $pdf->move(public_path('images'), $pdfName);
        $purhcase->pdflink = $pdfName;
        $purhcase->save();
        if ($purhcase) {
            return redirect()->route('shareholdermeeting.index');
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
