<?php

namespace App\Http\Controllers\User;

use App\Models\Anak;
use App\Models\User;
use App\Models\Region;
use App\Models\Timbangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateOrangtuaRequest;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $user = User::where('username', Auth::user()->username)->first();
        $anaks = Anak::where('user_id', $user->id)->get();

        $imtChart = $this->imtChart($user);
        $pbChart = $this->pbChart($user);
        $bbChart = $this->bbChart($user);

        return view('user.index', [
            'user' => Auth::user(),
            'anaks' => $anaks,

            'imtChart' => $imtChart,
            'pbChart' => $pbChart,
            'bbChart' => $bbChart
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
        return redirect('/');
    }

    private function imtChart($user)
    {
        // Menghitung jumlah total imt_status yang dimiliki oleh user tertentu
        $totalImtStatus = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->where('anaks.user_id', $user->id)
            ->count();

        $counts = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->join('users', 'anaks.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('imt_status, COUNT(*) as count')
            ->groupBy('imt_status')
            ->pluck('count', 'imt_status');

        $wastedCount = $counts->get('WASTED');
        $normalCount = $counts->get('NORMAL');
        $obesitasCount = $counts->get('RESIKO OBESITAS');


        // Menghitung persentase untuk setiap kategori
        $wastedPercentage = $totalImtStatus != 0
            ? ($wastedCount / $totalImtStatus) * 100
            : null;
        $normalPercentage = $totalImtStatus != 0
            ? ($normalCount / $totalImtStatus) * 100
            : null;
        $obesitasPercentage = $totalImtStatus != 0
            ? ($obesitasCount / $totalImtStatus) * 100
            : null;



        $data = [
            'WASTED' => round($wastedPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'RESIKO OBESITAS' => round($obesitasPercentage, 1),
        ];

        return $data;
    }

    private function pbChart($user)
    {
        $totalPbStatus = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->where('anaks.user_id', $user->id)
            ->count();

        $counts = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->join('users', 'anaks.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('pb_status, COUNT(*) as count')
            ->groupBy('pb_status')
            ->pluck('count', 'pb_status');

        $stuntedCount = $counts->get('STUNTED');
        $normalCount = $counts->get('NORMAL');
        $tinggiCount = $counts->get('TINGGI');

        $stuntedPercentage = $totalPbStatus != 0
            ? ($stuntedCount / $totalPbStatus) * 100
            : null;
        $normalPercentage = $totalPbStatus != 0
            ? ($normalCount / $totalPbStatus) * 100
            : null;
        $tinggiPercentage = $totalPbStatus != 0
            ? ($tinggiCount / $totalPbStatus) * 100
            : null;


        $data = [
            'STUNTED' => round($stuntedPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'TINGGI' => round($tinggiPercentage, 1),
        ];
        return $data;
    }

    private function bbChart($user)
    {
        $totalBbStatus = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->where('anaks.user_id', $user->id)
            ->count();

        $counts = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->join('users', 'anaks.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('bb_status, COUNT(*) as count')
            ->groupBy('bb_status')
            ->pluck('count', 'bb_status');
        $underweightCount = $counts->get('UNDERWEIGHT');
        $normalCount = $counts->get('NORMAL');
        $obesitasCount = $counts->get('RESIKO OBESITAS');

        // Menghitung persentase untuk setiap kategori
        $underweightPercentage = $totalBbStatus != 0
            ? ($underweightCount / $totalBbStatus) * 100
            : null;
        $normalPercentage = $totalBbStatus != 0
            ? ($normalCount / $totalBbStatus) * 100
            : null;
        $obesitasPercentage = $totalBbStatus != 0
            ? ($obesitasCount / $totalBbStatus) * 100
            : null;

        $data = [
            'UNDERWEIGHT' => round($underweightPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'RESIKO OBESITAS' => round($obesitasPercentage, 1),

        ];

        return $data;
    }
}
