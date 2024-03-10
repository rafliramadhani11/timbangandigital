<?php

namespace App\Http\Controllers;


use App\Models\Anak;
use App\Models\User;
use App\Models\Region;
use App\Charts\IMTChart;
use App\Models\Timbangan;
use Illuminate\Http\Request;
use App\Charts\BeratBadanChart;
use App\Charts\PanjangBadanChart;
use Illuminate\Support\Facades\DB;
use App\Charts\Dashboard\UsersChart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrangtuaRequest;
use App\Http\Requests\UpdateOrangtuaRequest;
use App\Charts\Dashboard\IMTChart as IMTChartDashboard;
use App\Charts\Dashboard\BeratBadanChart as BeratBadanChartDashboard;
use App\Charts\Dashboard\PanjangBadanChart as PanjangBadanChartDashboard;


class AdminController extends Controller
{
    public function index(BeratBadanChartDashboard $bbchart)
    {
        $regionsUser = DB::table('regions')
            ->join('users', function ($join) {
                $join->on('regions.id', '=', 'users.region_id')
                    ->where('users.admin', '!=', 1);
            })
            ->select('regions.*', 'users.*')
            ->get();

        $totalAnak = DB::table('regions')
            ->leftJoin('users', 'regions.id', '=', 'users.region_id')
            ->leftJoin('anaks', 'users.id', '=', 'anaks.user_id')
            ->where('users.admin', '!=', 1)
            ->sum('anaks.id');

        $usersKategori = $this->usersKategori();
        $imtNormal = $this->imtNormal();
        $pbNormal = $this->pbNormal();
        $bbNormal = $this->bbNormal();

        return view('admin.index', [
            "user_nav" => Auth::user(),
            'regions' => Region::get(),

            'regionsUser' => $regionsUser,
            'totalAnak' => $totalAnak,

            'usersKategori' => $usersKategori,

            'imtchart' => $imtNormal,
            'pbchart' => $pbNormal,
            'bbchart' => $bbNormal,
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
        Timbangan::where('anak_id', null)->update($dataTimbangan);
        return redirect()->back()->with('storedAnak', 'Berhasil menambah data anak !');
    }


    public function allUsers()
    {
        return view('admin.users', [
            "user_nav" => Auth::user(),
            'users' => User::where('id', '!=', Auth::user()->id)->latest()->paginate(10)->withQueryString(),
            'regions' => Region::all()
        ]);
    }

    public function showUser($username)
    {
        $user = User::where('username', $username)->first();
        $anaks = $user->anaks()->with('timbangans')->get();
        $timbangan = Timbangan::where('anak_id', null)->first();


        // $bb_status = fuzzy_bb_usia(3, 2.5, true); // UNDERWEIGHT
        // $bb_status = fuzzy_bb_usia(3, 2.5, false); // NORMAL


        // $pb_status = fuzzy_tb_usia(3, 45.6, true); // STUNTED
        // $pb_status = fuzzy_tb_usia(3, 45.6, false); // NORMAL

        // $pb_status = fuzzy_tb_usia(7, 82.5, false); // TINGGI
        // $pb_status = fuzzy_tb_usia(7, 82.5, true); // NORMAL

        // dd($pb_status);

        return view('admin.show', [
            "user_nav" => Auth::user(),

            'user' => $user,
            'regions' => Region::all(),

            'anaks' => $anaks,
            'timbangan' => $timbangan,
        ]);
    }

    public function showAnak(
        $username,
        $id,
        PanjangBadanChart $pbchart,
        BeratBadanChart $bbchart,
        IMTChart $imtchart,
    ) {
        $username = User::where('username', $username)->first();
        $anak = Anak::where('id', $id)->first();
        $user = Auth::user();
        $timbangan = Timbangan::where('anak_id', null)->first();

        return view('admin.anak.show', [
            'user' => $user,
            "user_nav" => Auth::user(),
            'regions' => Region::all(),

            'pbchart' => $pbchart->build($anak->id),
            'bbchart' => $bbchart->build($anak->id),
            'imtchart' => $imtchart->build($anak->id),

            'username' => $username,
            'anak' => $anak,
            'timbangan' => $timbangan,
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    private function usersKategori()
    {
        $totalUsersByRegion = Region::leftJoin('users', 'regions.id', '=', 'users.region_id')
            ->selectRaw('regions.name as region_name, COUNT(users.id) as total_users')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->pluck('total_users', 'region_name')
            ->toArray();

        $totalAnak = Region::leftJoin('users', 'regions.id', '=', 'users.region_id')
            ->leftJoin('anaks', 'users.id', '=', 'anaks.user_id')
            ->selectRaw('COUNT(anaks.id) as total_children')
            ->groupBy('regions.id')
            ->pluck('total_children')
            ->toArray();

        $regionNames = collect($totalUsersByRegion)->keys()->all();
        $usersByRegion = collect($totalUsersByRegion)->values()->all();

        $data = [
            'totalAnak' => $totalAnak,
            'regionNames' => $regionNames,
            'usersByRegion' => $usersByRegion,
        ];

        return $data;
    }

    private function imtNormal()
    {
        $totalNormalImtByRegion = Region::select('regions.name as region_name')
            ->selectRaw(
                '
        SUM(CASE WHEN timbangans.imt_status = "NORMAL" THEN 1 ELSE 0 END) / COUNT(timbangans.id) * 100 as percent_normal'
            )
            ->join('users', 'regions.id', '=', 'users.region_id')
            ->join('anaks', 'users.id', '=', 'anaks.user_id')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->region_name => round($item->percent_normal, 1)];
            });
        $regionKeys = $totalNormalImtByRegion->keys()->all();
        $regionValues = $totalNormalImtByRegion->values()->all();

        $data = array_combine($regionKeys, $regionValues);

        return $data;
    }

    private function pbNormal()
    {
        $totalNormalPbByRegion = Region::select('regions.name as region_name')
            ->selectRaw(
                '
        SUM(CASE WHEN timbangans.pb_status = "NORMAL" THEN 1 ELSE 0 END) / COUNT(timbangans.id) * 100 as percent_normal'
            )
            ->join('users', 'regions.id', '=', 'users.region_id')
            ->join('anaks', 'users.id', '=', 'anaks.user_id')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->region_name => round($item->percent_normal, 1)];
            });
        $regionKeys = $totalNormalPbByRegion->keys()->all();
        $regionValues = $totalNormalPbByRegion->values()->all();

        $data = array_combine($regionKeys, $regionValues);

        return $data;
    }

    private function bbNormal()
    {
        $totalNormalBbByRegion = Region::select('regions.name as region_name')
            ->selectRaw(
                '
        SUM(CASE WHEN timbangans.bb_status = "NORMAL" THEN 1 ELSE 0 END) / COUNT(timbangans.id) * 100 as percent_normal'
            )
            ->join('users', 'regions.id', '=', 'users.region_id')
            ->join('anaks', 'users.id', '=', 'anaks.user_id')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->region_name => round($item->percent_normal, 1)];
            });
        $regionKeys = $totalNormalBbByRegion->keys()->all();
        $regionValues = $totalNormalBbByRegion->values()->all();

        $data = array_combine($regionKeys, $regionValues);
        return $data;
    }
}
