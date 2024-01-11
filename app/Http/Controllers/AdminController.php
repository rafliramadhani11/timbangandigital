<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Region;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateOrangtuaRequest;


class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index', [
            "user" => Auth::user()
        ]);
    }

    public function allUsers()
    {
        return view('admin.users', [
            'user' => Auth::user(),
            'users' => User::where('id', '!=', Auth::user()->id)->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
            'regions' => Region::all()
        ]);
    }



    public function allRegions($slug)
    {
        $user = Auth::user();
        $regions = Region::where('id', '!=', Auth::user()->region_id)->latest();
        $region = Region::where('slug', $slug)->first();

        return view('admin.regions', [
            'user' => $user,
            'regions' => $regions,
            'region' => $region
        ]);
    }

    public function showUser($username)
    {
        $user = User::where('username', $username)->first();
        return view('admin.show', [
            'user' => $user,
            'anaks' => $user->anaks
        ]);
    }

    public function editUser($username)
    {
        $user = User::where('username', $username)->first();
        return view('admin.edit', [
            'user' => $user,
            'regions' => Region::all()
        ]);
    }

    public function updateUser(UpdateOrangtuaRequest $request, $username)
    {
        $user = User::where('username', $username)->first();

        $id = User::find($user->id);
        $validated = $request->validated();
        $changes = array_diff_assoc($validated, $id->toArray());

        if (!empty($changes)) {
            $id->update($validated);
            return redirect()->route('admin.show', $user->username)->with('updatedParent', 'Data berhasil di perbarui !');
        } else {
            return redirect()->route('admin.show', $user->username);
        }
    }

    public function delete($username)
    {
        $user = User::where('username', $username)->first();
        $user->delete();
        return redirect()->route('admin.users')->with('deleted', 'Data berhasil di hapus !');
    }
}
