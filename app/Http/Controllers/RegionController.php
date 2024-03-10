<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Timbangan;
use App\Charts\Region\IMTChart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Charts\Region\BeratBadanChart;
use App\Charts\Region\PanjangBadanChart;

class RegionController extends Controller
{
    public function index($slug, BeratBadanChart $bbchart)
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
        $totalPB = Timbangan::whereIn('anak_id', function ($query) use ($region) {
            $query->select('id')
                ->from('anaks')
                ->whereIn('user_id', function ($query) use ($region) {
                    $query->select('id')
                        ->from('users')
                        ->where('admin', '!=', 1)
                        ->where('region_id', $region->id);
                });
        })
            ->whereHas('anak.user', function ($query) use ($region) {
                $query->where('admin', '!=', 1)
                    ->where('region_id', $region->id);
            })
            ->whereHas('anak.timbangans')
            ->count();

        $pbStunted = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('pb_status', 'STUNTED');
                });
            })
            ->count();

        $pbNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('pb_status', 'NORMAL');
                });
            })
            ->count();

        $pbTinggi = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('pb_status', 'TINGGI');
                });
            })
            ->count();

        $stuntedPercentage = $totalPB != 0
            ? ($pbStunted / $totalPB) * 100
            : null;
        $normalPercentage = $totalPB != 0
            ? ($pbNormal / $totalPB) * 100
            : null;
        $tinggiPercentage = $totalPB != 0
            ? ($pbTinggi / $totalPB) * 100
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
        $totalIMT = Timbangan::whereIn('anak_id', function ($query) use ($region) {
            $query->select('id')
                ->from('anaks')
                ->whereIn('user_id', function ($query) use ($region) {
                    $query->select('id')
                        ->from('users')
                        ->where('admin', '!=', 1)
                        ->where('region_id', $region->id);
                });
        })
            ->whereHas('anak.user', function ($query) use ($region) {
                $query->where('admin', '!=', 1)
                    ->where('region_id', $region->id);
            })
            ->whereHas('anak.timbangans')
            ->count();

        $imtWasted = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('imt_status', 'WASTED');
                });
            })
            ->count();

        $imtNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('imt_status', 'NORMAL');
                });
            })
            ->count();

        $imtObesitas = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('imt_status', 'RESIKO OBESITAS');
                });
            })
            ->count();

        $wastedPercentage = $totalIMT != 0
            ? ($imtWasted / $totalIMT) * 100
            : null;
        $normalPercentage = $totalIMT != 0
            ? ($imtNormal / $totalIMT) * 100
            : null;
        $obesitasPercentage = $totalIMT != 0
            ? ($imtObesitas / $totalIMT) * 100
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
        $totalBB = Timbangan::whereIn('anak_id', function ($query) use ($region) {
            $query->select('id')
                ->from('anaks')
                ->whereIn('user_id', function ($query) use ($region) {
                    $query->select('id')
                        ->from('users')
                        ->where('admin', '!=', 1)
                        ->where('region_id', $region->id);
                });
        })
            ->whereHas('anak.user', function ($query) use ($region) {
                $query->where('admin', '!=', 1)
                    ->where('region_id', $region->id);
            })
            ->whereHas('anak.timbangans')
            ->count();

        $bbUnderweight = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('bb_status', 'UNDERWEIGHT');
                });
            })
            ->count();

        $bbNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('bb_status', 'NORMAL');
                });
            })
            ->count();

        $bbObesitas = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('bb_status', 'RESIKO OBESITAS');
                });
            })
            ->count();

        $underweightPercentage = $totalBB != 0
            ? ($bbUnderweight / $totalBB) * 100
            : null;
        $normalPercentage = $totalBB != 0
            ? ($bbNormal / $totalBB) * 100
            : null;
        $obesitasPercentage = $totalBB != 0
            ? ($bbObesitas / $totalBB) * 100
            : null;

        $kategoriBB = [
            'UNDERWEIGHT' => round($underweightPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'RESIKO OBESITAS' => round($obesitasPercentage, 1),
        ];

        return $kategoriBB;
    }
}
