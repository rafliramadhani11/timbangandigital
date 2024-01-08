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

        Timbangan::create($validated);
        return 'berhasil';
    }
}
