<?php

namespace App\Charts\User;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PanjangBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($user): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $pbCategories = DB::table('anaks')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->where('anaks.user_id', $user->id)
            ->selectRaw('
            COUNT(*) as total_pb,
            SUM(CASE WHEN timbangans.pb < 44.2 THEN 1 ELSE 0 END) as pendek,
            SUM(CASE WHEN timbangans.pb >= 44.2 AND timbangans.pb < 70.5 THEN 1 ELSE 0 END) as normal,
            SUM(CASE WHEN timbangans.pb >= 70.5 THEN 1 ELSE 0 END) as tinggi
            ')->first();

        $jumlahpb = $pbCategories->total_pb;

        $persentasePendek = ($jumlahpb > 0) ? round(($pbCategories->pendek / $jumlahpb) * 100, 1) : 0;
        $persentaseNormal = ($jumlahpb > 0) ? round(($pbCategories->normal / $jumlahpb) * 100, 1) : 0;
        $persentaseTinggi = ($jumlahpb > 0) ? round(($pbCategories->tinggi / $jumlahpb) * 100, 1) : 0;

        $kategoriPB = [
            'Pendek' => $persentasePendek,
            'Normal' => $persentaseNormal,
            'Tinggi' => $persentaseTinggi,
        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriPB))
            ->setLabels(array_keys($kategoriPB));
    }
}
