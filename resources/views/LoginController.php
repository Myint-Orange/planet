<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        // dd("Arrive Show");
        return view('auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    function login(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);
        try {
            if (Auth::attempt($request->only(['email', 'password']))) {
                $request->session()->regenerate();

                return redirect()->route('dashboard.index')->with('msg', 'User login successfully');
            } else {

                return redirect()->back()->with('msg', 'User not loged in');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('msg', 'User not loged in');
        }
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
