<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class CreateController extends Controller
{

    public function __invoke(){
        return view('posts.create',[
            'tags' => 'design, fashion, travel, music, party, video, photography, adventure',
        ])->with('components.first_nav');
    }
}
