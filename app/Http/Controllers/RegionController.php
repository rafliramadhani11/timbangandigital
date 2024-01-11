<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    public function index($slug)
    {
        $region = Region::where('slug', $slug)->first();
        $user = Auth::user();
        return view('admin.region.index', [
            "user_nav" => Auth::user(),

            'user' => $user,
            'regions' => Region::all(),
            'region' => $region
        ]);
    }
}
