<?php

namespace App\Http\Controllers\User;

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
    public function show($username, $id)
    {
        $username = User::where('username', $username)->first();
        $anak = Anak::where('id', $id)->first();
        $user = Auth::user();
        $timbangan = Timbangan::where('anak_id', null)->first();

        $imtChart = $this->imtChart($anak->id);
        $pbChart = $this->pbChart($anak->id);
        $bbChart = $this->bbChart($anak->id);

        return view('user.anak.show', [
            'user' => $user,
            "user_nav" => Auth::user(),
            'regions' => Region::all(),

            'username' => $username,
            'anak' => $anak,
            'timbangan' => $timbangan,

            'imtChart' => $imtChart,
            'pbChart' => $pbChart,
            'bbChart' => $bbChart
        ]);
    }

    public function update($id, Request $request)
    {
        DB::table('anaks')
            ->where('id', $id)
            ->update(['name' => $request->input('name')]);

        return redirect()->back();
    }

    private function imtChart($id)
    {
        $timbanganData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at')
            ->pluck('imt')
            ->toArray();
        $tanggalData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at')
            ->pluck('created_at')
            ->map->format('j M')
            ->toArray();

        $data = array_combine($tanggalData, $timbanganData);
        return $data;
    }

    private function pbChart($id)
    {
        $timbanganData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at')
            ->pluck('pb')
            ->toArray();
        $tanggalData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at')
            ->pluck('created_at')
            ->map->format('j M')
            ->toArray();

        $data = array_combine($tanggalData, $timbanganData);
        return $data;
    }

    private function bbChart($id)
    {
        $timbanganData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at')
            ->pluck('bb')
            ->toArray();
        $tanggalData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at')
            ->pluck('created_at')
            ->map->format('j M')
            ->toArray();

        $data = array_combine($tanggalData, $timbanganData);
        return $data;
    }
}
