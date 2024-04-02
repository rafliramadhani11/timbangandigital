<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthenticationController extends Controller
{
    public function login()
    {
        return view('guest.login');
    }

    public function auth(LoginRequest $request)
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
        return redirect('/');
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return redirect()->back()
                ->with('userUndefined', 'User tidak di temukan');
        }
        $key = 'example_key';
        $payload = [
            'username' => $user->username,
            'password' => $user->password
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        $link = url('/reset-password/' . $user->id . '/' . $token);

        return redirect()->route('reset-password', [$user->id, $token]);
    }

    public function resetPassword(Request $request, $id, $token)
    {
        $user = User::find($id);
        if (!$user) {
            return 'Whoopss User not found';
        }
        $key = 'example_key';
        JWT::decode($token, new Key($key, 'HS256'));
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:3|confirmed',
        ], [
            'password.confirmed' => 'Password tidak sama',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->password = Hash::make(strtolower($request->password));
        $user->save();

        return redirect()->route('login')->with('changePassword', 'Password Berhasil di ganti');
    }
}
