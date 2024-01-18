<?php

namespace App\Charts\User;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeratBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($user): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $bbCategories = DB::table('anaks')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->where('anaks.user_id', $user->id)
            ->selectRaw('
            COUNT(*) as total_bb,
            SUM(CASE WHEN timbangans.bb < 5.3 THEN 1 ELSE 0 END) as kurus,
            SUM(CASE WHEN timbangans.bb >= 5.3 AND timbangans.bb < 8.2 THEN 1 ELSE 0 END) as normal,
            SUM(CASE WHEN timbangans.bb >= 8.2 THEN 1 ELSE 0 END) as gemuk
            ')->first();

        $jumlahbb = $bbCategories->total_bb;

        $persentaseKurus = ($jumlahbb > 0) ? round(($bbCategories->kurus / $jumlahbb) * 100, 1) : 0;
        $persentaseNormal = ($jumlahbb > 0) ? round(($bbCategories->normal / $jumlahbb) * 100, 1) : 0;
        $persentaseGemuk = ($jumlahbb > 0) ? round(($bbCategories->gemuk / $jumlahbb) * 100, 1) : 0;

        $kategoriBB = [
            'Kurus' => $persentaseKurus,
            'Normal' => $persentaseNormal,
            'Gemuk' => $persentaseGemuk,
        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriBB))
            ->setLabels(array_keys($kategoriBB));
    }
}
