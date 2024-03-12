<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Region;
use App\Models\Timbangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    public function index($slug)
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

        $kategoriPB = $this->PersentasePB($slug);
        $kategoriIMT = $this->PersentaseIMT($slug);
        $kategoriBB = $this->PersentaseBB($slug);

        return view('admin.region.index', [
            "user_nav" => Auth::user(),

            'user' => $user,
            'users' => $users,
            'regions' => Region::all(),
            'region' => $region,

            'anaks' => $anaks,
            'kategoriIMT' => $kategoriIMT,
            'kategoriPB' => $kategoriPB,
            'kategoriBB' => $kategoriBB,

            'timbangans' => $timbangans,
            'jumlaTimbangIMT' => $jumlaTimbangIMT,
            'jumlaTimbangPB' => $jumlaTimbangPB,
            'jumlaTimbangBB' => $jumlaTimbangBB
        ]);
    }

    private function PersentasePB($slug)
    {
        $region = Region::where('slug', $slug)->first();

        $totalTimbanganRegion = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->count();

        $pbStunted = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('pb_status', 'STUNTED')->count();

        $pbNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('pb_status', 'NORMAL')->count();

        $pbTinggi = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('pb_status', 'TINGGI')->count();

        $stuntedPercentage = $totalTimbanganRegion != 0
            ? ($pbStunted / $totalTimbanganRegion) * 100
            : null;
        $normalPercentage = $totalTimbanganRegion != 0
            ? ($pbNormal / $totalTimbanganRegion) * 100
            : null;
        $tinggiPercentage = $totalTimbanganRegion != 0
            ? ($pbTinggi / $totalTimbanganRegion) * 100
            : null;

        $kategoriPB = [
            'STUNTED' => round($stuntedPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'TINGGI' => round($tinggiPercentage, 1),
        ];
        return $kategoriPB;
    }

    private function PersentaseIMT($slug)
    {
        $region = Region::where('slug', $slug)->first();

        $totalTimbanganRegion = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->count();

        $imtWasted = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('imt_status', 'WASTED')->count();

        $imtNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('imt_status', 'NORMAL')->count();

        $imtObesitas = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('imt_status', 'RESIKO OBESITAS')->count();

        $wastedPercentage = $totalTimbanganRegion != 0
            ? ($imtWasted / $totalTimbanganRegion) * 100
            : null;
        $normalPercentage = $totalTimbanganRegion != 0
            ? ($imtNormal / $totalTimbanganRegion) * 100
            : null;
        $obesitasPercentage = $totalTimbanganRegion != 0
            ? ($imtObesitas / $totalTimbanganRegion) * 100
            : null;

        $kategoriIMT = [
            'WASTED' => round($wastedPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'RESIKO OBESITAS' => round($obesitasPercentage, 1),
        ];
        return $kategoriIMT;
    }

    private function PersentaseBB($slug)
    {
        $region = Region::where('slug', $slug)->first();

        $totalTimbanganRegion = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->count();

        $bbUnderweight = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('bb_status', 'UNDERWEIGHT')->count();

        $bbNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('bb_status', 'NORMAL')->count();

        $bbObesitas = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })->where('bb_status', 'RESIKO OBESITAS')->count();

        $underweightPercentage = $totalTimbanganRegion != 0
            ? ($bbUnderweight / $totalTimbanganRegion) * 100
            : null;
        $normalPercentage = $totalTimbanganRegion != 0
            ? ($bbNormal / $totalTimbanganRegion) * 100
            : null;
        $obesitasPercentage = $totalTimbanganRegion != 0
            ? ($bbObesitas / $totalTimbanganRegion) * 100
            : null;

        $kategoriBB = [
            'UNDERWEIGHT' => round($underweightPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'RESIKO OBESITAS' => round($obesitasPercentage, 1),
        ];
        return $kategoriBB;
    }
}
