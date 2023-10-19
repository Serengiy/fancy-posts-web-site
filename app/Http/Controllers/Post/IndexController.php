<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Request;


class IndexController extends Controller
{

    public function __invoke(FilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->get();
        $if_args = ((request()->all()) ? true : false);

        return view('posts.index', [
           'posts' => ($if_args)
               ? $posts
               : Post::latest()->get(),
           'latest_posts' => Post::latest()->limit(4)->get(),
           'tags' => 'design, fashion, travel, music, party, video, photography, adventure',
           'if_args' => $if_args,
           'authors' => User::where('role', 1)->get(),
        ]);
    }
}
