<?php

namespace App\Http\Controllers;

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
        $pb = $request->input('pb');
        $bb = $request->input('bb');
        // IMT RUMUS
        $pbMeter = $pb / 100;
        $imt =  $bb / ($pbMeter * $pbMeter);
        // ---------------------------------------
        $dataTimbangan = [
            'anak_id' => $id,
            'umur' => $request->input('umur'),
            'pb' => $pb,
            'bb' => $bb,
            'imt' =>  round($imt, 1),
        ];
        Timbangan::where('anak_id', null)->update($dataTimbangan);
        return redirect()->back()->with('updatedTimbang', 'Berhasil Update Data !');
    }
}
