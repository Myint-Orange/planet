<?php

namespace App\Http\Controllers\IR;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Post;
use App\Models\Title;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareHolderController extends Controller
{
    public function index(){
        $type = Type::where('name', 'ir_shareholder')->first();
        return view('admin.irpages.shareholder.index', compact(['type']));

    }
    public function editBanner(Request $request){
        $type = Type::find($request->type_id);
        ImageController::updateTypeImage($request);
        $type->typeTitles[0]->update([
            'title_en' => $request->menu_en,
            'title_th' => $request->menu_th,
            'title_ch' => $request->menu_ch,
        ]);
      
        return redirect()->route('shareholder.index');

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
