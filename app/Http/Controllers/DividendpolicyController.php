<?php

namespace App\Http\Controllers;

use App\Models\Dividendpolicy;
use Illuminate\Http\Request;
use App\Models\Creditrating;
use App\Models\Dividenddatalist;
use App\Models\Irnews;
use App\Models\IRBanner;
use Illuminate\Support\Facades\DB;


class DividendpolicyController extends Controller
{

    public function indexs()
    {
        $type = DB::table('irbanners')->where('irtype', 'Dividendpolicy')->first();
        $posts = DB::table('dividenddatalists')->get();

        return view('admin.irpages.dividendpolicy.index', compact('type', 'posts'));
    }
    public function stored(Request $request)
    {
        $irBanner = new IRBanner();
        $irBanner->name_en = $request->menu_en;
        $irBanner->name_th = $request->menu_th;
        $irBanner->name_ch = $request->menu_ch;
        $irBanner->irtype = "Dividendpolicy";
        $irBanner->save();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('dividendpolicy.index');
    }

    public function storededit(Request $request)
    {
        $type = IRBanner::where('irtype', 'Dividendpolicy')->where('id', $request->type_id)->first();
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
        return redirect()->route('dividendpolicy.index');
    }

    public function index()
    {
        $type = DB::table('irbanners')->where('irtype', 'Dividendpolicy')->first();
        $posts = DB::table('dividenddatalists')->get();
        return view('admin.irpages.dividendpolicy.index', compact('type', 'posts'));
    }
    public function create()
    {
         return view('admin.irpages.dividendpolicy.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =Dividenddatalist::create($request->all());
        if($data){
            return redirect()->route('dividendpolicy.index');
        }else{
            return redirect()->route('dividendpolicy.create');
        }


    }

    public function editdetail($posts_id)
    {
        $post = DB::table('dividenddatalists')->where('id', $posts_id)->first();
        if ($post) {
            return view('admin.irpages.dividendpolicy.update', compact('post'));
        } else {

            return redirect()->route('dividendpolicy.index');
        }
    }
    public function storedetail(Request $request)
    {
        $data = Dividenddatalist::where('id', $request->id)->first();
        if ($data) {
            $data->update($request->all());
        }
        if($data){
            return redirect()->route('dividendpolicy.index');
        }else{
            return redirect()->route('dividendpolicy.create');
        }
     }
    public function show(Dividendpolicy $dividendpolicy)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dividendpolicy $dividendpolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dividendpolicy $dividendpolicy)
    {
        //
    }

    public function destroy($post_id)
    {   $post = Dividenddatalist::findOrFail($post_id);
        $post->delete();
        return redirect()->route('dividendpolicy.index');
    }
    
}
