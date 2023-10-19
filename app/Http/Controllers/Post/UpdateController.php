<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Post $post)
    {


        $formField = $request->validated();

        if(isset($formField['tags']) ){
            $formField['tags'] = implode(', ', $formField['tags']);
        }

        if(isset($formField['main_pic'])){
            $formField['main_pic'] = substr(Storage::put('public/main_pic', $formField['main_pic']), 7);
        }
        if(isset($formField['preview_pic'])){
            $formField['preview_pic'] = substr(Storage::put('public/preview_pic', $formField['preview_pic']), 7);
        }

        $post->update($formField);
        return redirect('/')->with('message', 'Post updated succesfully');
    }

}
