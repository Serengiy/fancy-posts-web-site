<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class DestroyController extends Controller
{

    public function __invoke(Post $post){
        $post->delete();
        return redirect('/')->with('message', 'Post deleted successfully');
    }
}
