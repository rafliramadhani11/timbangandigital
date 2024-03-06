<?php

namespace App\Charts\Dashboard;

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

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $imtNormalByRegion = Region::selectRaw('regions.name as region_name, ROUND(AVG(timbangans.imt) / 5 * 100, 1) as imt_percentage')
            ->join('users', 'regions.id', '=', 'users.region_id')
            ->join('anaks', 'users.id', '=', 'anaks.user_id')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->whereIn('regions.id', [1, 2, 3, 4, 5, 6])
            ->where('timbangans.imt_status', 'NORMAL')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name');


        $imtNormalByRegionArray = $imtNormalByRegion->get()->map(function ($item) {
            return [
                'region_name' => $item->region_name,
                'imt_percentage' => $item->imt_percentage,
            ];
        })->pluck('imt_percentage', 'region_name')->toArray();



        $totalPercentage = array_sum($imtNormalByRegionArray);
        if ($totalPercentage > 100) {
            $imtNormalByRegionArray = array_map(function ($percent) use ($totalPercentage) {
                return round(($percent / $totalPercentage) * 100, 1);
            }, $imtNormalByRegionArray);
        }
        $regionNames = array_keys($imtNormalByRegionArray);
        $imtValues = array_values($imtNormalByRegionArray);

        return $this->chart->pieChart()
            ->addData($imtValues)
            ->setHeight(400)
            ->setWidth(400)
            ->setLabels($regionNames);
    }
}
