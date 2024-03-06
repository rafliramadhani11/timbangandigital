<?php

namespace App\Charts\User;

use App\Models\Anak;
use App\Models\Timbangan;
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
        // Menghitung jumlah total imt_status yang dimiliki oleh user tertentu
        $totalImtStatus = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->where('anaks.user_id', $user->id)
            ->count();

        $counts = Timbangan::join('anaks', 'timbangans.anak_id', '=', 'anaks.id')
            ->join('users', 'anaks.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('imt_status, COUNT(*) as count')
            ->groupBy('imt_status')
            ->pluck('count', 'imt_status');

        $wastedCount = $counts->get('WASTED');
        $normalCount = $counts->get('NORMAL');
        $obesitasCount = $counts->get('RESIKO OBESITAS');


        // Menghitung persentase untuk setiap kategori
        $wastedPercentage = $totalImtStatus != 0
            ? ($wastedCount / $totalImtStatus) * 100
            : null;
        $normalPercentage = $totalImtStatus != 0
            ? ($normalCount / $totalImtStatus) * 100
            : null;
        $obesitasPercentage = $totalImtStatus != 0
            ? ($obesitasCount / $totalImtStatus) * 100
            : null;



        $kategoriIMT = [
            'WASTED' => $wastedPercentage,
            'NORMAL' => $normalPercentage,
            'RESIKO OBESITAS' => $obesitasPercentage,
        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriIMT))
            ->setLabels(array_keys($kategoriIMT))
            ->setColors(['#ff829d', '#6fcdcd', '#ffd778']);
    }
}
