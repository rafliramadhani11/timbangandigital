<?php

namespace App\Http\Controllers;


use App\Models\Anak;
use App\Models\User;
use App\Models\Region;
use App\Models\Timbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrangtuaRequest;
use App\Http\Requests\UpdateOrangtuaRequest;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            "user_nav" => Auth::user(),
            'regions' => Region::all()
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            "user_nav" => Auth::user(),
            'regions' => Region::all()
        ]);
    }

    public function store(StoreOrangtuaRequest $request)
    {

        $request['password'] = bcrypt($request->password);
        User::create($request->validated());
        return redirect()->route('admin.users')->with('stored', 'Data baru telah di buat !');
    }

    public function storeAnak($username, Request $request)
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
            'name' => $request->input('name'),
            'jeniskelamin' => $request->input('jeniskelamin'),
        ]);
        $anak->save();

        $pb = $request->input('pb');
        $bb = $request->input('bb');
        $imt = 0;
        if ($pb > 0) {
            $imt = $bb / ($pb * $pb);
        } else {
            $imt = null;
        };
        $dataTimbangan = [
            'anak_id' => $anak->id,

            'umur' => $request->input('umur'),
            'pb' => $pb,
            'bb' => $bb,
            'imt' =>  round($imt, 1)
        ];

        Timbangan::where('anak_id', null)->update($dataTimbangan);
        return redirect()->back()->with('storedAnak', 'Berhasil menambah data anak !');
    }


    public function allUsers()
    {
        return view('admin.users', [
            "user_nav" => Auth::user(),
            'users' => User::where('id', '!=', Auth::user()->id)->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
            'regions' => Region::all()
        ]);
    }

    public function allRegions($slug)
    {
        $user = Auth::user();
        $region = Region::where('slug', $slug)->first();
        return view('admin.regions', [
            "user_nav" => Auth::user(),

            'user' => $user,
            'regions' => Region::all(),
            'users' => $region->users->where('admin', '!=', 1),
            'region' => $region
        ]);
    }

    public function showUser($username)
    {
        $user = User::where('username', $username)->first();
        $anaks = $user->anaks()->with('timbangans')->get();
        $timbangan = Timbangan::where('anak_id', null)->first();

        return view('admin.show', [
            "user_nav" => Auth::user(),

            'user' => $user,
            'regions' => Region::all(),

            'anaks' => $anaks,
            'timbangan' => $timbangan,
        ]);
    }

    public function showAnak($username, $id)
    {
        $username = User::where('username', $username)->first();
        $anak_id = Anak::where('id', $id)->first();
        $user = Auth::user();
        return view('admin.anak.show', [
            'user' => $user,
            'regions' => Region::all(),

            'username' => $username,
            'anak' => $anak_id,
            "user_nav" => Auth::user(),
        ]);
    }

    public function editUser($username)
    {
        $user = User::where('username', $username)->first();
        return view('admin.edit', [
            "user_nav" => Auth::user(),
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

    public function updateAnak($id, Request $request)
    {
        DB::table('anaks')
            ->where('id', $id)
            ->update(['name' => $request->input('name')]);

        return redirect()->back()->with('updatedName', 'Berhasil memperbarui nama !');
    }

    public function delete($username)
    {
        $user = User::where('username', $username)->first();
        $user->delete();
        return redirect()->route('admin.users')->with('deleted', 'Data berhasil di hapus !');
    }

    public function deleteAnak($id)
    {
        Anak::where('id', $id)->delete();
        return redirect()->back()->with('deletedAnak', 'Data berhasil di hapus');
    }

    public function search(Request $request)
    {

        $users = User::where('name', 'like', '%' . $request->search . '%')
            ->where('admin', '=', 0)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('partials.table', compact('users'));
    }
}
