<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request): RedirectResponse
    {

        $formField = $request->validated();

        $formField['tags'] = implode(', ',$formField['tags']);
        $formField['main_pic'] = substr(Storage::put('public/main-imgs', $formField['main_pic'] ), 7);
        $formField['preview_pic']=substr(Storage::put('public/preview-imgs', $formField['preview_pic']),7);
        $formField['user_id'] = auth()->id();
        Post::create($formField);
        return redirect('/')->with('message', 'Post created successfully!');

    }
}
