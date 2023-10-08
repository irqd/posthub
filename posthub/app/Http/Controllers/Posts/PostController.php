<?php

namespace App\Http\Controllers\Posts;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function profile($username)
    {
        $user_id = User::where('username', $username)->first()->id;

        return view('posts.profile', [
            'username' => $username,
            'user_id' => $user_id
        ]);
    }
}
