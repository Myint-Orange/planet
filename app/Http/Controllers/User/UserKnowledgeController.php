<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Http\Request;

class UserKnowledgeController extends Controller
{
    public function indexActivity()
    {
        $type = Type::where('name', 'activity')->first();
        $posts = $type->posts()->orderBy('created_at', 'desc')->get();
        return view('user.knowledge.activities', compact(['type', 'posts']));
    }
    public function detailActivity($post_id)
    {
        $type = Type::where('name', 'activity')->first();
        $post = Post::find($post_id);
        $posts = $type->posts()->orderBy('created_at', 'desc')->get();
        // $posts = $posts->reject(function ($item) use ($post) {
        //     return $item->id === $post->id;
        // });
        return view('user.knowledge.detail-activity', compact(['post', 'type', 'posts']));
    }
    public function indexInterest()
    {
        $type = Type::where('name', 'interest')->first();
        $posts = $type->posts()->orderBy('created_at', 'desc')->get();
        return view('user.knowledge.interest', compact(['type', 'posts']));
    }
    public function detailInterest($post_id)
    {
        $type = Type::where('name', 'interest')->first();
        $post = Post::find($post_id);
        $posts = $type->posts()->orderBy('created_at', 'desc')->get();
        return view('user.knowledge.detail-interest', compact(['post', 'type', 'posts']));
    }
    public function indexSocial()
    {
        $type = Type::where('name', 'social')->first();
        $posts = $type->posts()->orderBy('created_at', 'desc')->get();
        return view('user.knowledge.social', compact(['type', 'posts']));
    }
}
