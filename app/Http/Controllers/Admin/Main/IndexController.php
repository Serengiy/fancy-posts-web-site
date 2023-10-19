<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Filters\UserFilter;
use App\Http\Requests\User\FilterRequest;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function index(){
        return view('admin.main.index', [
            'posts' => Post::all()->count(),
            'likes' => Like::all()->count(),
            'comments' => Comment::all()->count(),
            'authors' => User::all()->count(),
        ]);
    }

    public function posts(){
        return view('admin.main.all-posts', [
            'posts' => Post::latest()->get(),
        ]);
    }

    public function authors(FilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
        $sort = User::filter($filter)->get();
        return view('admin.main.all-authors', [
            'users' => $sort->map(function ($user){
                $user['likes_count']=Post::withCount('likes')->where('user_id', $user->id)->get()->sum('likes_count');
                $user['comments_count']=Post::withCount('comments')->where('user_id', $user->id)->get()->sum('comments_count');
                return $user;
            })->sortByDesc((request()->all() ? request('sort') : 'first_name')),
            'roles' => User::getRoles()
        ]);
    }

}
