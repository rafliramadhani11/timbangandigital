<?php

namespace App\Charts\Dashboard;

use App\Models\Region;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeratBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $totalNormalBbByRegion = Region::select('regions.name as region_name')
            ->selectRaw(
                '
        SUM(CASE WHEN timbangans.bb_status = "NORMAL" THEN 1 ELSE 0 END) / COUNT(timbangans.id) * 100 as percent_normal'
            )
            ->join('users', 'regions.id', '=', 'users.region_id')
            ->join('anaks', 'users.id', '=', 'anaks.user_id')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->region_name => round($item->percent_normal, 1)];
            });
        $regionKeys = $totalNormalBbByRegion->keys()->all();
        $regionValues = $totalNormalBbByRegion->values()->all();

        return $this->chart->pieChart()
            ->addData($regionValues)
            ->setHeight(400)
            ->setWidth(400)
            ->setStroke(5, ['white'])
            ->setLabels($regionKeys);
    }
}
