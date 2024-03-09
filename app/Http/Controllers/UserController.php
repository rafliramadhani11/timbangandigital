<?php

namespace App\Http\Controllers;

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
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
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
}
