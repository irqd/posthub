<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {   
        // clear session
        session()->flush();

        // logout user
        auth()->logout();
        return redirect()->route('index');
    }
}
