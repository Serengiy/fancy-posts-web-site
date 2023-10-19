<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class ShowController extends Controller
{

    private function whoLiked($post){
        $new_ar=[];
        foreach ($post->likes()->get() as $user){
            array_push($new_ar, $user->user_id);
        }
        $new_ar = User::find($new_ar);
        return $new_ar;
    }

    public function __invoke(Post $post){
        return view('posts.show', [
            'likes'=> $post->likes()->count(),
            'post' => $post,
            'whoLiked' => $this->whoLiked($post),
            'latest_posts' => Post::latest()->limit(4)->get(),
            'tags' => 'design, fashion, travel, music, party, video, photography, adventure',
            'authors' => User::all(),
            'comments' => $post->comments()->get(),
        ]);
    }
}
