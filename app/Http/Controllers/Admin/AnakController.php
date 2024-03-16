<?php

namespace App\Http\Controllers\Admin;

use App\Models\Anak;
use App\Models\User;
use App\Models\Region;
use App\Models\Timbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TimbangRequest;

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

        return view('admin.anak.show', [
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

    public function store($username, TimbangRequest $request)
    {
        $user = User::where('username', $username)->first();
        $request->validate([
            'name' => 'required',
            'jeniskelamin' => 'required',
            'umur' => 'required',

            'pb' => 'required',
            'bb' => 'required',
        ]);
        $anak = new Anak([
            'user_id' => $user->id,
            'name' => ucfirst($request->input('name')),
            'jeniskelamin' => $request->input('jeniskelamin'),
        ]);
        // $anak->save();
        // IMT RUMUS
        $umur = $request->input('umur');

        $pb = $request->input('pb');
        $bb = $request->input('bb');
        $pbMeter = $pb / 100;

        $imt =  $bb / ($pbMeter * $pbMeter);
        // ---------------------------------------


        // FUZZY
        $imt_status = ($anak->jeniskelamin == 'Laki Laki')
            ? fuzzy_imt_usia($umur, round($imt, 1), true)
            : fuzzy_imt_usia($umur, round($imt, 1), false);

        $pb_status = ($anak->jeniskelamin == 'Laki Laki')
            ? fuzzy_tb_usia($umur, $pb, true)
            : fuzzy_tb_usia($umur, $pb, false);

        $bb_status = ($anak->jeniskelamin == 'Laki Laki')
            ? fuzzy_bb_usia($umur, $bb, true)
            : fuzzy_bb_usia($umur, $bb, false);
        // -----------------------------------

        $dataTimbangan = [
            'anak_id' => $anak->id,
            'umur' => $request->input('umur'),
            'imt_status' => strtoupper($imt_status),
            'pb_status' => strtoupper($pb_status),
            'bb_status' => strtoupper($bb_status),
            'pb' => $pb,
            'bb' => $bb,
            'imt' =>  round($imt, 1)
        ];
        dd($dataTimbangan);
        Timbangan::where('anak_id', null)->update($dataTimbangan);
        return redirect()->back()->with('storedAnak', 'Berhasil menambah data anak !');
    }

    public function update($id, Request $request)
    {
        DB::table('anaks')
            ->where('id', $id)
            ->update(['name' => ucfirst($request->input('name'))]);

        return redirect()->back()->with('updatedName', 'Berhasil memperbarui nama !');
    }

    public function delete($id)
    {
        Anak::where('id', $id)->delete();
        return redirect()->back()->with('deletedAnak', 'Data berhasil di hapus');
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
