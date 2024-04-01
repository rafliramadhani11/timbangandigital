<?php

namespace App\Charts\Region;

use App\Models\Timbangan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeratBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($region): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $totalBB = Timbangan::whereIn('anak_id', function ($query) use ($region) {
            $query->select('id')
                ->from('anaks')
                ->whereIn('user_id', function ($query) use ($region) {
                    $query->select('id')
                        ->from('users')
                        ->where('admin', '!=', 1)
                        ->where('region_id', $region->id);
                });
        })
            ->whereHas('anak.user', function ($query) use ($region) {
                $query->where('admin', '!=', 1)
                    ->where('region_id', $region->id);
            })
            ->whereHas('anak.timbangans')
            ->count();

        $bbUnderweight = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('bb_status', 'UNDERWEIGHT');
                });
            })
            ->count();

        $bbNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('bb_status', 'NORMAL');
                });
            })
            ->count();

        $bbObesitas = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('bb_status', 'RESIKO OBESITAS');
                });
            })
            ->count();

        $underweightPercentage = $totalBB != 0
            ? ($bbUnderweight / $totalBB) * 100
            : null;
        $normalPercentage = $totalBB != 0
            ? ($bbNormal / $totalBB) * 100
            : null;
        $obesitasPercentage = $totalBB != 0
            ? ($bbObesitas / $totalBB) * 100
            : null;

        $kategoriIMT = [
            'UNDERWEIGHT' => round($underweightPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'RESIKO OBESITAS' => round($obesitasPercentage, 1),
        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriIMT))
            ->setLabels(array_keys($kategoriIMT))
            ->setColors(['#ff829d', '#6fcdcd', '#ffd778'])
            ->setHeight(300)
            ->setWidth(500)
            ->setStroke(5, ['white']);
    }
}
