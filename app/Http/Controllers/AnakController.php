<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Anak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnakUpdateRequest;

class AnakController extends Controller
{
    public function edit($id)
    {
        $anak = Anak::where('id', $id)->first();
        return view('user.anak.edit', [
            'anak' => $anak
        ]);
    }

    public function store($username, Request $request)
    {
        $user = User::where('username', $username)->first();
        $request->validate([
            'name' => 'required',
            'umur' => 'required',
            'gender' => 'required|in:Laki Laki,Perempuan',

            'tb' => 'required',
            'bb' => 'required',
        ]);

        $anak = new Anak([
            'user_id' => $user->id,

            'name' => $request->input('name'),
            'umur' => $request->input('umur'),
            'gender' => $request->input('gender'),

            'tb' => $request->input('tb'),
            'bb' => $request->input('bb'),
        ]);



        $anak->save();

        return redirect()->back()->with('storedAnak', 'Berhasil menambah data anak !');
    }

    public function update($id, Request $request)
    {
        DB::table('anaks')
            ->where('id', $id)
            ->update(['name' => $request->input('name')]);

        return redirect()->back()->with('updatedName', 'Berhasil memperbarui nama !');
    }

    public function delete($id)
    {
        Anak::where('id', $id)->delete();
        return redirect()->back();
    }
}
