<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function login(Request $request)
    {
        $request->validate([
                               'username' => 'required',
                               'password' => 'required',
                           ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }


    public function register(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'email' => 'required|email|unique:users',
                               'password' => 'required|min:8',
                           ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("home")->withSuccess('You have signed-in');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
