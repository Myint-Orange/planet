<?php

namespace App\Http\Controllers;

use App\Models\Financialinformation;
use App\Models\Irnews;
use App\Models\IRBanner;
use App\Models\Shareholdermeeting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FinancialinformationController extends Controller
{

    public function indexs()
    {
        $type = DB::table('irbanners')->where('irtype', 'Finicialinformation')->first();
        $sharemeeting = Shareholdermeeting::get();
        if (count($sharemeeting) > 0) {
            $posts = DB::table('shareholdermeetings')->where('type', 'Invitation_letter')->get();
            $attachmentposts = DB::table('shareholdermeetings')->where('type', 'Attachement')->get();
            $criteriaposts = DB::table('shareholdermeetings')->where('type', 'Criteria')->get();
        } else {
            $posts = [];
            $attachmentposts = [];
            $criteriaposts = [];
        }
        return view('admin.irpages.finicialinformation.index', compact('type', 'posts', 'attachmentposts', 'criteriaposts'));
    }

    public function storeBanner(Request $request)
    {
        $irBanner = new IRBanner();
        $irBanner->name_en = $request->menu_en;
        $irBanner->name_th = $request->menu_th;
        $irBanner->name_ch = $request->menu_ch;
        $irBanner->irtype = "Finicialinformation";
        $irBanner->save();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('storeBanner.index');
    }

    public function editBanner(Request $request)
    {
        $type = IRBanner::where('irtype', 'Finicialinformation')->where('id', $request->type_id)->first();
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
        return redirect()->route('finicialinformation.index');
    }
    public function index()
    {
        $type = DB::table('irbanners')->where('irtype', 'Finicialinformation')->first();
        $financialinformation = Financialinformation::get();
        if (count($financialinformation) > 0) {
            $posts = DB::table('financialinformations')->where('ratiotype_en', 'Liquidity Ratio')->get();
            $attachmentposts = DB::table('financialinformations')->where('ratiotype_en', 'Liquidity Ratio')->get();
            $criteriaposts = DB::table('financialinformations')->where('ratiotype_en', 'Liquidity Ratio')->get();
        } else {
            $posts = [];
            $attachmentposts = [];
            $criteriaposts = [];
        }
        return view('admin.irpages.finicialinformation.index', compact('type', 'posts', 'attachmentposts', 'criteriaposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //Letter
    public function create()
    {
        return view('admin.irpages.finicialinformation.create');
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'menu_en' => 'required',
            'menu_th' => 'required',
            'menu_ch' => 'required',
            'yearone' => 'required',
            'yeartwo' => 'required',
            'yearthree' => 'required',
        ]);
        $purhcase = new Financialinformation();
        $purhcase->rationame_en = $request->menu_en;
        $purhcase->rationame_th = $request->menu_th;
        $purhcase->rationame_ch = $request->menu_ch;
        $purhcase->ratiotype_en = "Liquidity Ratio";
        $purhcase->ratiotype_th = "Liquidity Ratio";
        $purhcase->ratiotype_ch = "Liquidity Ratio";
        $purhcase->yearone = $request->yearone;
        $purhcase->yeartwo = $request->yeartwo;
        $purhcase->yearthree = $request->yearthree;
        $purhcase->save();
        if ($purhcase) {
            return redirect()->route('finicialinformation.index');
        }
    }
    //attachment
    public function attachementcreate()
    {
        return view('admin.irpages.finicialinformation.attachment_create');
    }
    public function attachementstore(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'pdflink' => 'required',
        ]);
        $purhcase = new Financialinformation();
        $purhcase->name = $request->name;
        $purhcase->type = "Attachement";
        $pdf = $request->file('pdflink');
        $purhcase->pdflink = $pdf->getClientOriginalName();
        $pdfName = $pdf->getClientOriginalName();
        $pdf->move(public_path('images'), $pdfName);
        $purhcase->pdflink = $pdfName;
        $purhcase->save();
        if ($purhcase) {
            return redirect()->route('finicialinformation.index');
        }
    }

    //criteria
    public function criteriacreate()
    {
        return view('admin.irpages.finicialinformation.criteria_create');
    }
    public function criteriastore(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'pdflink' => 'required',
        ]);
        $purhcase = new Financialinformation();
        $purhcase->name = $request->name;
        $purhcase->type = "Criteria";
        $pdf = $request->file('pdflink');
        $purhcase->pdflink = $pdf->getClientOriginalName();
        $pdfName = $pdf->getClientOriginalName();
        $pdf->move(public_path('images'), $pdfName);
        $purhcase->pdflink = $pdfName;
        $purhcase->save();
        if ($purhcase) {
            return redirect()->route('finicialinformation.index');
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
    public function edit(Request $request, $post_id)
    {

        $post = Financialinformation::where('id', $post_id)->first();
        if ($post) {
            return view('admin.irpages.finicialinformation.update', compact('post'));
        }
        return view('admin.irpages.shareholdermeeting.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post_id)
    {
        $post = Financialinformation::where('id', $post_id)->first();
        if ($post) {
            $post->update([
                'rationame_en' => $request->menu_en,
                'rationame_th' => $request->menu_th,
                'rationame_ch' => $request->menu_ch,
                'yearone' => $request->yearone,
                'yeartwo' => $request->yeartwo,
                'yearthree' => $request->yearthree,
                'ratiotype_en' => "Liquidity Ratio",
                'ratiotype_th' => "Liquidity Ratio",
                 'ratiotype_ch' => "Liquidity Ratio",
            ]);
            return redirect()->route('finicialinformation.index');
        } else {
            return view('admin.irpages.finicialinformation.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post_id)
    {
        $post = Financialinformation::where('id', $post_id)->first();
        if ($post) {
            $post->delete();
        }
        return redirect()->route('finicialinformation.index');
    }
}
