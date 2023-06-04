<?php

namespace App\Http\Controllers\IR;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\IRBanner;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailNotificationController extends Controller
{
    public function index(){
        $type = DB::table('irbanners')->where('irtype', 'EmailNotification')->first();
        $posts =DB::table('cities')->get();
       $useremailnotifications= DB::table('useremailnotifications')->get();
        return view('admin.irpages.emailNotification.index', compact('type','posts','useremailnotifications'));
    }
    public function store(Request $request){
        $irBanner = new IRBanner();
        $irBanner->name_en = $request->menu_en;
        $irBanner->name_th = $request->menu_th;
        $irBanner->name_ch = $request->menu_ch;
        $irBanner->irtype = "EmailNotification";
        $irBanner->save();

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $irBanner->image = $imageName;
        $irBanner->save();
        return redirect()->route('emailNotification.index');
    }
    public function editBanner(Request $request){
        $type = IRBanner::find($request->type_id);
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
        return redirect()->route('emailNotification.index');

    }
    public function createPost(){
        return view("admin.irpages.shareholder.create");

    }
    public function storePost(Request $request){
         // dd($request);
          $user=Auth::user();
          $type = Type::where('name', 'ir_shareholder')->first();
          $post=Post::create([
                'type_id'=>$type->id,
                'name'=>'shareholder',
                'user_id'=>$user->id,  
          ]);
         // dd($post);
          $name=Title::create([
              'title_en'=>$request->name_en,
              'title_th'=>$request->name_th,
              'title_ch'=>$request->name_ch,
              'post_id'=>$post->id,
          ]);
          $num_holder=Title::create([
             'title_en'=>$request->num_holder,
             'title_th'=>$request->num_holder,
             'title_ch'=>$request->num_holder,
             'post_id'=>$post->id,
          ]);
          $proportion=Title::create([
            'title_en'=>$request->proportion,
            'title_th'=>$request->proportion,
            'title_ch'=>$request->proportion,
            'post_id'=>$post->id,
         ]);
          return redirect()->route('shareholder.index');

    }
    public function updatePost($post_id){
        $post=Post::find($post_id);
        return view("admin.irpages.shareholder.update",compact('post'));

    }
    public function editPost(Request $request){
       // dd($request);
        $post=Post::find($request->post_id);
        $post->titles[0]->update([
            'title_en'=>$request->name_en,
            'title_th'=>$request->name_th,
            'title_ch'=>$request->name_ch,
        ]);
        $post->titles[1]->update([
            'title_en'=>$request->num_holder,
            'title_th'=>$request->num_holder,
            'title_ch'=>$request->num_holder,
        ]);
        $post->titles[2]->update([
            'title_en'=>$request->proportion,
            'title_th'=>$request->proportion,
            'title_ch'=>$request->proportion,
        ]);
        return redirect()->route('shareholder.index');

    }
    public function destroyPost($post_id){
        $post=Post::find($post_id);
        $post->delete();
        return redirect()->route('shareholder.index');
    }


}
