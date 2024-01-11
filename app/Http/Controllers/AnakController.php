<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Anak;
use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnakUpdateRequest;

class AnakController extends Controller
{
    public function show($username, $id)
    {
        $username = User::where('username', $username)->first();
        $anak_id = Anak::where('id', $id)->first();
        $user = Auth::user();
        return view('user.anak.show', [
            'user' => $user,
            'regions' => Region::all(),

            'username' => $username,
            'anak' => $anak_id,
        ]);
    }

    public function update($id, Request $request)
    {
        DB::table('anaks')
            ->where('id', $id)
            ->update(['name' => $request->input('name')]);

        return redirect()->back()->with('updatedName', 'Berhasil memperbarui nama !');
    }
}
