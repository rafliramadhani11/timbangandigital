<?php

namespace App\Charts\Dashboard;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class UsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($regionNames, $totalUsersPerRegion,  $anakTotals): \ArielMejiaDev\LarapexCharts\BarChart
    {


        return $this->chart->barChart()
            ->addData('User', $totalUsersPerRegion)
            ->addData('Anak',  $anakTotals)
            ->setColors(['#FFC107', '#D32F2F'])
            ->setXAxis($regionNames)
            ->setGrid();
    }
}
