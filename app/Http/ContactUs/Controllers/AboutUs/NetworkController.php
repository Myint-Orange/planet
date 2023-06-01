<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Global\ImageController;
use App\Models\Content;
use App\Models\Group;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NetworkController extends Controller
{

    public function index()
    {
        $type = Type::where('name', 'network')->first();
        return view('admin.aboutUs.network.index', compact('type'));
    }
    public function create()
    {
        return view('admin.aboutUs.network.create');
    }

    public function updateType(Request $request)
    {
        $request->validate([
            'title_th' => 'required',
            'sub_title_th' => 'required',
            'title_en' => 'required',
            'sub_title_en' => 'required',
            'title_ch' => 'required',
            'sub_title_ch' => 'required',
        ]);
        $imageName = ImageController::updateTypeImage($request);
        $group = Group::where('name', 'about_us')->first();
        $type = Type::where('name', 'network')->first();



        $type->typeTitles[0]->update([
            'title_en' => $request->title_en,
            'title_th' => $request->title_th,
            'title_ch' => $request->title_ch,
            'group_id' => $group->id,
        ]);
        $type->typeTitles[1]->update([
            'title_en' => $request->sub_title_en,
            'title_th' => $request->sub_title_th,
            'title_ch' => $request->sub_title_ch,
            'group_id' => $group->id,
        ]);
        $notification = array(
            'message' => 'Network Title Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('network.index', compact('notification'));
    }
    public function store(Request $request)
    {
        $contact_en = $this->getContactLang($request, 'en');
        $contact_th = $this->getContactLang($request, 'th');
        $contact_ch = $this->getContactLang($request, 'ch');
        // dd($contact_en, $contact_th, $contact_ch);

        $imageName = ImageController::uploadImage($request);
        $type = Type::where('name', 'network')->first();
        $user = Auth::user();
        $post = Post::create([
            'name' => "network",
            'imgname' => $imageName,
            'user_id' => $user->id,
            'type_id' => $type->id,
        ]);

        $content = Content::create([
            'content_th' => $contact_th,
            'content_en' => $contact_en,
            'content_ch' => $contact_ch,
            'post_id' => $post->id,
        ]);
        return redirect()->route('network.index');
    }
    public function update($post_id)
    {
        $post = Post::find($post_id);
        $clinic_th = $this->splitContent($post->contents[0]->content_th);
        $clinic_en = $this->splitContent($post->contents[0]->content_en);
        $clinic_ch = $this->splitContent($post->contents[0]->content_ch);

        return view('admin.aboutUs.network.edit', compact(['clinic_th', 'clinic_en', 'clinic_ch', 'post']));
    }

    public function edit(Request $request, $lang)
    {
        //dd($request);
        $post = Post::find($request->post_id);
        $clinic = $this->getContact($request);
        // dd($lang, $clinic);
        $post->contents[0]->update([
            'content_' . $lang => $clinic,
            'post_id' => $post->id,
        ]);
        return redirect()->route('network.update', $post->id);
    }

    public function editImage(Request $request)
    {
        ImageController::updatePostImage($request);
        return redirect()->route('network.update', $request->post_id);
    }

    public function getContact($request)
    {
        $contact  = $request->company_name . "##";
        $contact .= $request->clinic_name . "##";
        $contact .= $request->business_type . "##";
        $contact .= $request->date_of_op . "##";
        $contact .= $request->branch_name . "##";
        $contact .= $request->location . "##";
        $contact .= $request->website . "##";
        $contact .= $request->tel_number . "##";
        $contact .= $request->email . "##";
        $contact .= $request->office_hour . "##";
        $contact .= $request->area_size . "##";

        // dd($contact);
        return $contact;
    }
    public function getContactLang($request, $lang)
    {
        $contact  = $request['company_name_' . $lang] . "##";
        $contact .= $request['clinic_name_' . $lang] . "##";
        $contact .= $request['business_type_' . $lang] . "##";
        $contact .= $request['date_of_op_' . $lang] . "##";
        $contact .= $request['branch_name_' . $lang] . "##";
        $contact .= $request['location_' . $lang] . "##";
        $contact .= $request['website_' . $lang] . "##";
        $contact .= $request['tel_number_' . $lang] . "##";
        $contact .= $request['email_' . $lang] . "##";
        $contact .= $request['office_hour_' . $lang] . "##";
        $contact .= $request['area_size_' . $lang] . "##";

        // dd($contact);
        return $contact;
    }

    public function splitContent($clinic)
    {
        $returnVal = null;
        if ($clinic == null) {
            $returnVal = array(
                'company_name' => '',
                'clinic_name' => '',
                'business_type' => '',
                'date_of_op' => '',
                'branch_name' => '',
                'location' => '',
                'website' => '',
                'tel_number' => '',
                'email' => '',
                'office_hour' => '',
                'area_size' => '',
            );
        } else {
            $result = explode('##', $clinic);

            if (count($result) > 0) {
                $returnVal = array(
                    'company_name' => $result[0],
                    'clinic_name' => $result[1],
                    'business_type' => $result[2],
                    'date_of_op' => $result[3],
                    'branch_name' => $result[4],
                    'location' => $result[5],
                    'website' => $result[6],
                    'tel_number' => $result[7],
                    'email' => $result[8],
                    'office_hour' => $result[9],
                    'area_size' => $result[10],
                );
            }
        }


        return  $returnVal;
    }
}
