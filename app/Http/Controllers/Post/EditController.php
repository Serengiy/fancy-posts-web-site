<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class EditController extends Controller
{

    public function __invoke(Post $post){
        return view('posts.edit',[
            'post'=>$post,
            'tags' => 'design, fashion, travel, music, party, video, photography, adventure',
        ])->with('components.first_nav');
    }
}
