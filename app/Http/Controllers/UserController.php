<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class   UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function store(StoreRequest $request){
        $formFields=$request->validated();
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['profile_picture'] = substr(Storage::put('public/users_pict', $formFields['profile_picture']), 7);
        $formFields['role'] = 2;
//        dd($formFields);
        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'You registered successfully');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('')->with('message', 'You logged out');
    }

    public function login(){
        return view('users.login');
    }


    public function authenticate(LoginRequest $request){

        $formFields = $request->validated();
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }

    public function manage(){
        return view('users.manage', [
            'posts' => auth()->user()->posts,
        ]);
    }

    public function likedPosts(){
        return view('users.liked-posts', [
            'posts' => auth()->user()->likes,
        ]);
    }

    public function updateRole(Request $request){
        $changes = ($request->changes);
        foreach ($changes as $user => $role){
            if(User::where('id', $user)->update(['role' => (int)$role])){
                $status = true;
            }else{
                return response()->json([
                    'message' => 'Something happened',
                ]);
            }
        }
        return response()->json([
            'status' => $status,
            'message' => 'Updated successfully',
        ]);
    }
}
