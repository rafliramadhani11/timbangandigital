<?php

namespace App\Charts\User;

use App\Models\Timbangan;
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
        $totalBbStatus = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->where('anaks.user_id', $user->id)
            ->count();

        $counts = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->join('users', 'anaks.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('bb_status, COUNT(*) as count')
            ->groupBy('bb_status')
            ->pluck('count', 'bb_status');
        $underweightCount = $counts->get('UNDERWEIGHT');
        $normalCount = $counts->get('NORMAL');
        $obesitasCount = $counts->get('RESIKO OBESITAS');

        // Menghitung persentase untuk setiap kategori
        $underweightPercentage = $totalBbStatus != 0
            ? ($underweightCount / $totalBbStatus) * 100
            : null;
        $normalPercentage = $totalBbStatus != 0
            ? ($normalCount / $totalBbStatus) * 100
            : null;
        $obesitasPercentage = $totalBbStatus != 0
            ? ($obesitasCount / $totalBbStatus) * 100
            : null;

        $kategoriBB = [
            'UNDERWEIGHT' => round($underweightPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'RESIKO OBESITAS' => round($obesitasPercentage, 1),

        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriBB))
            ->setLabels(array_keys($kategoriBB))
            ->setColors(['#ff829d', '#6fcdcd', '#ffd778'])
            ->setHeight(300)
            ->setStroke(5, ['white']);
    }
}
