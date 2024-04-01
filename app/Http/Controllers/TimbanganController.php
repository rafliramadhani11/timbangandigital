<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Timbangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class TimbanganController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pb' => 'required',
            'bb' => 'required',
        ]);
        $timbangan = Timbangan::create($validated);
        return $timbangan;
    }

    public function update($id, Request $request)
    {
        // IMT RUMUS
        $pb = $request->input('pb');
        $bb = $request->input('bb');
        $pbMeter = $pb / 100;
        $imt =  $bb / ($pbMeter * $pbMeter);
        // ---------------------------------------
        $umur = $request->input('umur');
        $anak = Anak::where('id', $id)->first();
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
            'anak_id' => $id,
            'umur' => $request->input('umur'),
            'imt_status' => strtoupper($imt_status),
            'pb_status' => strtoupper($pb_status),
            'bb_status' => strtoupper($bb_status),
            'pb' => $pb,
            'bb' => $bb,
            'imt' =>  round($imt, 1),
        ];
        Timbangan::where('anak_id', null)->update($dataTimbangan);
        return redirect()->back()->with('updatedTimbang', 'Berhasil Update Data !');
    }
}
