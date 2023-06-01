<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Post;
use App\Models\TopicType;
use App\Models\Type;
use Illuminate\Http\Request;

class UserWorkWithUsController extends Controller
{
    public function indexWorkWithUs()
    {
        $group = Group::where('name', 'work_with_us')->first();
        $corevalue = Type::where('name', 'corevalue')->first();
        $benefit = Type::where('name', 'benefit')->first();
        $findjob = Type::where('name', 'findjob')->first();

        return view('user.workwithus.career', compact(['corevalue', 'benefit', 'findjob', 'group']));
    }
    public function detailWorkWithUs($post_id)
    {
        $group = Group::where('name', 'work_with_us')->first();
        $post = Post::find($post_id);
        $contact = Type::where('name', 'contact')->first();


        return view('user.workwithus.career-detail', compact(['post', 'group', 'contact']));
    }
    public function indexContact()
    {
        $topicTypes = TopicType::all();
        $group = Group::where('name', 'contactus')->first();
        $address = Type::where('name', 'address')->first();
        $followus = Type::where('name', 'followus')->first();
        $getthere = Type::where('name', 'getthere')->first();
        return view('user.workwithus.contact', compact(['address', 'followus', 'getthere', 'group', 'topicTypes']));
    }
}
