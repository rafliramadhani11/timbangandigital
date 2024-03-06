<?php

namespace App\Charts\Dashboard;

use App\Models\Region;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PanjangBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $pbNormalByRegion = Region::selectRaw('regions.name as region_name, ROUND(AVG(timbangans.pb) / 5 * 100, 1) as pb_percentage')
            ->join('users', 'regions.id', '=', 'users.region_id')
            ->join('anaks', 'users.id', '=', 'anaks.user_id')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->whereIn('regions.id', [1, 2, 3, 4, 5, 6])
            ->where('timbangans.pb_status', 'NORMAL')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->latest('timbangans.created_at')
            ->get();

        $pbNormalByRegionArray = $pbNormalByRegion->map(function ($item) {
            return [
                'region_name' => $item->region_name,
                'pb_percentage' => $item->pb_percentage,
            ];
        })->pluck('pb_percentage', 'region_name')->toArray();

        $totalPercentage = array_sum($pbNormalByRegionArray);
        if ($totalPercentage > 100) {
            $pbNormalByRegionArray = array_map(function ($percent) use ($totalPercentage) {
                return round(($percent / $totalPercentage) * 100, 1);
            }, $pbNormalByRegionArray);
        }
        $regionNames = array_keys($pbNormalByRegionArray);
        $pbValues = array_values($pbNormalByRegionArray);

        return $this->chart->pieChart()
            ->addData($pbValues)
            ->setHeight(400)
            ->setWidth(400)
            ->setLabels($regionNames);
    }
}
