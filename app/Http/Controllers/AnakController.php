<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnakUpdateRequest;
use DateTime;

class AnakController extends Controller
{
    public function edit($id)
    {
        $anak = Anak::where('id', $id)->first();
        return view('user.anak.edit', [
            'anak' => $anak
        ]);
    }

    public function update(AnakUpdateRequest $request, $user_id)
    {
        $anak = Anak::where('user_id', $user_id)->first();

        $validated = $request->validated();
        $id = Anak::find($anak->id);

        $changes = array_diff_assoc($validated, $id->toArray());

        if (!empty($changes)) {
            $id->update($validated);
            return redirect()->route('user.show', $anak->user->username)->with('updatedBaby', 'Berhasil mngubah data anak !');
        } else {
            return redirect()->route('user.show', $anak->user->username);
        }
    }
}
