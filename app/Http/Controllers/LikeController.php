<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request) {

        if(!auth()){
            return redirect('/login')->with('message', 'you have to log in first');
        }

        if($this->hasLiked($request)){
            $like = Like::where('post_id', $request->id)->where('user_id', auth()->user()->id);
            $like->delete();
            return response()->json([
                'likes' => Post::find($request->id)->likes()->count(),
                'hasLiked' => $this->hasLiked($request),
                'val'=>3,
            ]);
        }
        $like = new Like([
            'post_id' => $request->id,
            'user_id' => auth()->user()->id,

        ]);
        $like->save();

        return response()->json([

            'likes' => Post::find($request->id)->likes()->count(),
            'hasLiked' => $this->hasLiked($request),
            ]);
    }

    public function unlike(Request $request){
        if(!auth()){
            return redirect('/login')->with('message', 'you have to log in first');
        }

        if($this->hasLiked($request)){
            $like = Like::where('post_id', $request->post_id)->where('user_id', auth()->user()->id);
            $like->delete();
            return back();
        }
    }


    public function hasLiked(Request $request)
    {
        $post = Post::find($request);

        if(!$post[0]->likes()->where('user_id', auth()->user()->id)->get()->isEmpty() ){
            return true;
        } else{
            return false;
        }
    }
}
