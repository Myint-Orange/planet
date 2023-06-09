<?php

namespace App\Http\Controllers;

use App\Models\Dividendpolicyandpayment;
use Illuminate\Http\Request;
use App\Models\Dividendpolicy;
use App\Models\Creditrating;
use App\Models\Irnews;
use App\Models\IRBanner;
use Illuminate\Support\Facades\DB;

class DividendpolicyandpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $type = DB::table('irbanners')->where('irtype', 'Dividendpolicy')->first();
        $posts = DB::table('creditratings')->get();
        return view('admin.irpages.dividendpolicy.index', compact('type', 'posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type =DB::table('dividendpolicyandpayments')->first();
        return view('admin.irpages..dividendpolicy.paymentcreate', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'menu_en' => 'required',
            'menu_th' => 'required',
            'menu_ch' => 'required',
            'description_en' => 'required',
            'description_th' => 'required',
            'description_ch' => 'required',
        ]);
        $data =DB::table('dividendpolicyandpayments')->insert([
            'name_en' => $request->menu_en,
            'name_th' => $request->menu_th,
            'name_ch' => $request->menu_ch,
            'description_en' => $request->description_en,
            'description_th' => $request->description_th,
            'description_ch' => $request->description_ch

        ]);
        if($data){
            return redirect()->route('dividendpolicy.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dividendpolicyandpayment $dividendpolicyandpayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updated(Request $request){
        $post = Dividendpolicyandpayment::findOrFail($request->id);
        $post->update([
            'name_en' => $request->menu_en,
            'name_th' => $request->menu_th,
            'name_ch' => $request->menu_ch,
            'description_en' => $request->description_en,
            'description_th' => $request->description_th,
            'description_ch' => $request->description_ch
        ]);
        return redirect()->route('dividendpolicy.index');
    }

    public function edit($id)
    {     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dividendpolicyandpayment $dividendpolicyandpayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dividendpolicyandpayment $dividendpolicyandpayment)
    {
        //
    }
}
