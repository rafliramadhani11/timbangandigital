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

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $bbNormalByRegion = Region::selectRaw('regions.name as region_name, ROUND(AVG(timbangans.bb) / 5 * 100, 1) as bb_percentage')
            ->join('users', 'regions.id', '=', 'users.region_id')
            ->join('anaks', 'users.id', '=', 'anaks.user_id')
            ->join('timbangans', 'anaks.id', '=', 'timbangans.anak_id')
            ->whereIn('regions.id', [1, 2, 3, 4, 5, 6])
            ->where('timbangans.bb_status', 'normal')
            ->groupBy('regions.id', 'regions.name')
            ->latest('timbangans.created_at') // Menambahkan latest() untuk mendapatkan data yang terakhir
            ->get();

        $bbNormalByRegionArray = $bbNormalByRegion->map(function ($item) {
            return [
                'region_name' => $item->region_name,
                'bb_percentage' => $item->bb_percentage,
            ];
        })->pluck('bb_percentage', 'region_name')->toArray();

        $totalPercentage = array_sum($bbNormalByRegionArray);

        // Normalisasi nilai persentase agar total tidak melebihi 100
        if ($totalPercentage > 100) {
            $bbNormalByRegionArray = array_map(function ($percent) use ($totalPercentage) {
                return round(($percent / $totalPercentage) * 100, 1);
            }, $bbNormalByRegionArray);
        }

        $regionNames = array_keys($bbNormalByRegionArray);
        $bbValues = array_values($bbNormalByRegionArray);



        return $this->chart->donutChart()
            ->addData($bbValues)
            ->setHeight(400)
            ->setWidth(400)
            ->setLabels($regionNames);
    }
}
