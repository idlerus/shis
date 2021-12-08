<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Handle a login Index view
     *
     * @return Application|Factory|View
     */
    public function indexLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a register Index view
     *
     * @return Application|Factory|View
     */
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
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('/')->withSuccess(__('generic.logInSuccess'));
        }
        return back()->withErrors(['password' => [__('generic.passwordInvalid')]]);
    }

    /**
     * Handle an register attempt
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:32|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,}$/',
            'agree' => 'required'
        ]);

        $data = $request->all();
        Auth::login($user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]));
        if($user)
            return redirect('/')->withSuccess(__('generic.registerSuccess'));
        else
            return back()->withErrors(__('generic.failedToRegister'));
    }

    /**
     * Handle a log-out action
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function logOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
