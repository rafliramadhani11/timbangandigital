<?php

namespace App\Charts\User;

use App\Models\Anak;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class IMTChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($user): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $imtCategories = DB::table('anaks')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->where('anaks.user_id', $user->id)
            ->selectRaw('
        COUNT(*) as total_imt,
        SUM(CASE WHEN timbangans.imt < 18.5 THEN 1 ELSE 0 END) as kurus,
        SUM(CASE WHEN timbangans.imt >= 18.5 AND timbangans.imt < 24.9 THEN 1 ELSE 0 END) as normal,
        SUM(CASE WHEN timbangans.imt >= 25 THEN 1 ELSE 0 END) as gemuk
    ')->first();

        $jumlahIMT = $imtCategories->total_imt;

        $persentaseKurus = ($jumlahIMT > 0) ? round(($imtCategories->kurus / $jumlahIMT) * 100, 1) : 0;
        $persentaseNormal = ($jumlahIMT > 0) ? round(($imtCategories->normal / $jumlahIMT) * 100, 1) : 0;
        $persentaseGemuk = ($jumlahIMT > 0) ? round(($imtCategories->gemuk / $jumlahIMT) * 100, 1) : 0;

        $kategoriIMT = [
            'Kurus' => $persentaseKurus,
            'Normal' => $persentaseNormal,
            'Gemuk' => $persentaseGemuk,
        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriIMT))
            ->setLabels(array_keys($kategoriIMT));
    }
}
