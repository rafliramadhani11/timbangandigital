<?php

namespace App\Charts\Region;

use App\Models\Timbangan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PanjangBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($region): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $totalPB = Timbangan::whereIn('anak_id', function ($query) use ($region) {
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

        $pbStunted = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('pb_status', 'STUNTED');
                });
            })
            ->count();

        $pbNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('pb_status', 'NORMAL');
                });
            })
            ->count();

        $pbTinggi = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('pb_status', 'TINGGI');
                });
            })
            ->count();

        $stuntedPercentage = $totalPB != 0
            ? ($pbStunted / $totalPB) * 100
            : null;
        $normalPercentage = $totalPB != 0
            ? ($pbNormal / $totalPB) * 100
            : null;
        $tinggiPercentage = $totalPB != 0
            ? ($pbTinggi / $totalPB) * 100
            : null;

        $kategoriPB = [
            'STUNTED' => round($stuntedPercentage, 1),
            'NORMAL' => round($normalPercentage, 1),
            'TINGGI' => round($tinggiPercentage, 1),
        ];

        return $this->chart->pieChart()
            ->addData(array_values($kategoriPB))
            ->setLabels(array_keys($kategoriPB))
            ->setColors(['#ff829d', '#6fcdcd', '#ffd778'])
            ->setHeight(400)
            ->setWidth(500)
            ->setStroke(5, ['white']);
    }
}
