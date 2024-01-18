<?php

namespace App\Http\Controllers;

use App\Charts\User\Anak\BBChart;
use App\Charts\User\Anak\IMTChart;
use App\Charts\User\Anak\PBChart;
use App\Models\Anak;
use App\Models\User;
use App\Models\Region;
use App\Models\Timbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AnakController extends Controller
{
    public function show($username, $id, IMTChart $imtchart, PBChart $pbchart, BBChart $bbchart)
    {
        $username = User::where('username', $username)->first();
        $anak_id = Anak::where('id', $id)->first();
        $timbangan = Timbangan::where('anak_id', $id)->first();
        $user = Auth::user();
        return view('user.anak.show', [
            'user' => $user,
            'regions' => Region::all(),
            'timbangan' => $timbangan,

            'username' => $username,
            'anak' => $anak_id,

            'imtchart' => $imtchart->build($anak_id->id),
            'pbchart' => $pbchart->build($anak_id->id),
            'bbchart' => $bbchart->build($anak_id->id)
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
