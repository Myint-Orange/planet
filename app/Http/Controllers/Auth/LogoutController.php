<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            //dd('Arriving log out');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('show');
        } catch (\Exception $e) {
            return redirect()->back()->with('msg', 'User logout failed');
        }
    }
}
