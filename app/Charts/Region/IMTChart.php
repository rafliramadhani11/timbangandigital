<?php

namespace App\Charts\Region;

use App\Models\Anak;
use App\Models\Region;
use App\Models\Timbangan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class IMTChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($region): \ArielMejiaDev\LarapexCharts\PieChart

    {
        $totalIMT = Timbangan::whereIn('anak_id', function ($query) use ($region) {
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

        $imtWasted = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('imt_status', 'WASTED');
                });
            })
            ->count();

        $imtNormal = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('imt_status', 'NORMAL');
                });
            })
            ->count();

        $imtObesitas = Timbangan::whereHas('anak.user', function ($query) use ($region) {
            $query->where('admin', '!=', 1)
                ->where('region_id', $region->id);
        })
            ->whereHas('anak', function ($query) {
                $query->whereHas('timbangans', function ($query) {
                    $query->where('imt_status', 'RESIKO OBESITAS');
                });
            })
            ->count();

        $wastedPercentage = $totalIMT != 0
            ? ($imtWasted / $totalIMT) * 100
            : null;
        $normalPercentage = $totalIMT != 0
            ? ($imtNormal / $totalIMT) * 100
            : null;
        $obesitasPercentage = $totalIMT != 0
            ? ($imtObesitas / $totalIMT) * 100
            : null;

        $kategoriIMT = [
            'WASTED' => round($wastedPercentage, 1),
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
