<?php

namespace App\Http\Controllers\User\UserIR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\IRBanner;
use App\Models\Ircontact;

class IRContactController extends Controller
{
    
        public function index(){
            $type = DB::table('irbanners')->where('irtype', 'IRContact')->first();
            $contactInformation =DB::table('ircontacts')->first();
            $typecontact = DB::table('irbanners')->where('irtype', 'IRContactInfo')->first();
            return view('admin.irpages.ircontact.index', compact('type','contactInformation','typecontact'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $irBanner = new IRBanner();
        $irBanner->name_en = $request->menu_en;
        $irBanner->name_th = $request->menu_th;
        $irBanner->name_ch = $request->menu_ch;
        $irBanner->irtype = "IRContact";
        $irBanner->save();

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('contact.index');
    }

    public function editBanner(Request $request){
        $type = IRBanner::where('id', $request->id)->where('irtype', 'IRContact')->first();
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
        return redirect()->route('contact.index');
    }

    public function storedetail(Request $request){
        $irBanner = new Ircontact();
        $irBanner->title = $request->title;
        $irBanner->subtitle = $request->subtitle;
        $irBanner->address = $request->address;
        $irBanner->phone = $request->phone;
        $irBanner->email = $request->email;
        $irBanner->locationmap = $request->location;
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('contact.index');
    }
    public function editdetail(Request $request)
    {
        $irBanner = Ircontact::where('id', $request->id)->first();
        if($request->image != null && $request->hasFile('image')){     
            $filename = str_replace('/embryo-planet/public', '', public_path('/images/'));
            $filename =  $filename . $irBanner->image;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $irBanner->image = $imageName;
            $irBanner->save();
        }
        $irBanner->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'locationmap' => $request->location,
        ]);
        return redirect()->route('contact.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
