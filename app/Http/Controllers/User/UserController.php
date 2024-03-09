<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Charts\User\BeratBadanChart;
use App\Charts\User\IMTChart;
use App\Charts\User\PanjangBadanChart;
use App\Models\Anak;
use App\Models\User;
use App\Models\Region;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateOrangtuaRequest;

class UserController extends Controller
{
    public function index(IMTChart $imtchart, PanjangBadanChart $pbchart, BeratBadanChart $bbchart)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $user = User::where('username', Auth::user()->username)->first();
        $anaks = Anak::where('user_id', $user->id)->get();

        return view('user.index', [
            'user' => Auth::user(),
            'anaks' => $anaks,

            'imtchart' => $imtchart->build($user),
            'pbchart' => $pbchart->build($user),
            'bbchart' => $bbchart->build($user)
        ]);
    }

    public function show($username)
    {
        $user = User::where('username', $username)->with('region')->first();
        if ($user->username != auth()->user()->username) {
            return redirect()->back();
        }
        return view('user.show', [
            'user' => $user,
            'anaks' => $user->anaks
        ]);
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->with('region')->first();
        if ($user->username != auth()->user()->username) {
            return redirect()->back();
        }
        return view('user.edit', [
            'user' => $user,
            'regions' => Region::all()
        ]);
    }

    public function update(UpdateOrangtuaRequest $request, $username)
    {
        $user = User::where('username', $username)->with('region')->first();
        if ($user->username != auth()->user()->username) {
            return redirect()->back();
        }

        $id = User::find($user->id);
        $validated = $request->validated();
        $changes = array_diff_assoc($validated, $id->toArray());

        if (!empty($changes)) {
            $id->update($validated);
            return redirect()->route('user.show', $user->username)->with('updatedParent', 'Data berhasil di perbarui !');
        } else {
            return redirect()->route('user.show', $user->username);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
