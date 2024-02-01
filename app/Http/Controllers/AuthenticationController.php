<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('guest.login');
    }

    public function auth(Request $request)
    {

        $rules = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($rules)) {
            $request->session()->regenerate();

            if (Auth::user()->admin) {
                return redirect('/dashboard/admin');
            }
            return redirect('/dashboard/user');
        }
        return back()->with('failedLogin', 'Sesuatu ada yang salah saat kamu menginput ');
    }

    public function register()
    {
        return view('guest.register', [
            'regions' => Region::get()
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
