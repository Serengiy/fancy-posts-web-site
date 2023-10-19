<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){

        $request->validate(['comment'=>'required']);
        $formFields = ([
            'parent_id' => $request->parent_id,
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
            ]);
        Comment::create($formFields);
        return back();
    }

    public function destroy(Request $request){
        Comment::find($request->id)->delete();
        return back();
    }
}
