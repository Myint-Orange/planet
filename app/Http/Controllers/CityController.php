<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\IRBanner;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $type = DB::table('irbanners')->where('irtype', 'EmailNotification')->first();
        $posts =DB::table('cities')->get();
       $useremailnotifications= DB::table('useremailnotifications')->get();
        return view('admin.irpages.emailNotification.index', compact('type','posts','useremailnotifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.irpages.emailNotification.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
        ]);
        $city = new City();
        $city->name = $request->name;
        $city->save();
        return redirect()->route('City.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $post = City::find($id);
        return view('admin.irpages.emailNotification.update', compact('post'));   

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
        ]);
        $city = City::find($id);
        $city->name = $request->name;
        $city->save();
        return redirect()->route('City.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
    }
    
    public function destroyPost($post_id){
        $post=City::find($post_id);
        $post->delete();
        return redirect()->route('City.index');
    }
}
