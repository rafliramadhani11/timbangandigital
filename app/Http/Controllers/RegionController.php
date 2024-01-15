<?php

namespace App\Http\Controllers;

use App\Charts\Region\BeratBadanChart;
use App\Models\Region;
use App\Charts\Region\IMTChart;
use App\Charts\Region\PanjangBadanChart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    public function index($slug, IMTChart $imtchart, PanjangBadanChart $pbchart, BeratBadanChart $bbchart)
    {
        $region = Region::where('slug', $slug)->first();
        $user = Auth::user();
        $users = $region->users()->where('admin', '!=', 1)->get(); // User dengan relasi Region
        $anaks = $users->flatMap(function ($user) {
            return $user->anaks;
        });
        $timbangans = $anaks->flatMap(function ($anak) {
            return $anak->timbangans;
        });
        $panjang_badans = $timbangans->pluck('pb');
        $berat_badans = $timbangans->pluck('bb');
        $indeks_massa_tubuhs = $timbangans->pluck('imt');

        $jumlaTimbangIMT = count($indeks_massa_tubuhs);
        $jumlaTimbangPB = count($panjang_badans);
        $jumlaTimbangBB = count($berat_badans);

        return view('admin.region.index', [
            "user_nav" => Auth::user(),

            'user' => $user,
            'users' => $users,
            'regions' => Region::all(),
            'region' => $region,

            'anaks' => $anaks,
            'imtchart' => $imtchart->build($indeks_massa_tubuhs),
            'pbchart' => $pbchart->build($panjang_badans),
            'bbchart' => $bbchart->build($berat_badans),

            'timbangans' => $timbangans,
            'jumlaTimbangIMT' => $jumlaTimbangIMT,
            'jumlaTimbangPB' => $jumlaTimbangPB,
            'jumlaTimbangBB' => $jumlaTimbangBB
        ]);
    }
}
