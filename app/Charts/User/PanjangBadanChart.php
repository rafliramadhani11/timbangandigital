<?php

namespace App\Charts\User;

use App\Models\Timbangan;
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
        $totalPbStatus = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->where('anaks.user_id', $user->id)
            ->count();

        $counts = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->join('users', 'anaks.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('pb_status, COUNT(*) as count')
            ->groupBy('pb_status')
            ->pluck('count', 'pb_status');

        $stuntedCount = $counts->get('STUNTED');
        $normalCount = $counts->get('NORMAL');
        $tinggiCount = $counts->get('TINGGI');

        $stuntedPercentage = $totalPbStatus != 0
            ? ($stuntedCount / $totalPbStatus) * 100
            : null;
        $normalPercentage = $totalPbStatus != 0
            ? ($normalCount / $totalPbStatus) * 100
            : null;
        $tinggiPercentage = $totalPbStatus != 0
            ? ($tinggiCount / $totalPbStatus) * 100
            : null;


        $kategoriPB = [
            'STUNTED' => $stuntedPercentage,
            'NORMAL' => $normalPercentage,
            'TINGGI' => $tinggiPercentage,
        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriPB))
            ->setLabels(array_keys($kategoriPB))
            ->setColors(['#ff829d', '#6fcdcd', '#ffd778']);
    }
}
