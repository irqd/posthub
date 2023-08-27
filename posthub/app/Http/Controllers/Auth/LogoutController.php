<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {   
        // logout user
        auth()->logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
