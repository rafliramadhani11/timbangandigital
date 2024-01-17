<?php

namespace App\Charts\Region;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeratBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($berat_badans): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $jumlahBB = count($berat_badans);

        if ($jumlahBB > 0) {
            $persentaseKurus = ($berat_badans->filter(function ($bb) {
                return $bb < 5.3;
            })->count() / $jumlahBB);

            $persentaseNormal = ($berat_badans->filter(function ($bb) {
                return $bb >= 5.3 && $bb < 8.2;
            })->count() / $jumlahBB);

            $persentaseObesitas = ($berat_badans->filter(function ($bb) {
                return $bb >= 8.2;
            })->count() / $jumlahBB);

            $persentaseKurus = round($persentaseKurus * 100, 1);
            $persentaseNormal = round($persentaseNormal * 100, 1);
            $persentaseObesitas = round($persentaseObesitas * 100, 1);

            $kategoriBB = ['Kurus', 'Normal', 'Obesitas'];

            return $this->chart->donutChart()
                ->addData([$persentaseKurus, $persentaseNormal, $persentaseObesitas])
                ->setLabels($kategoriBB)
                ->setColors(['#FF0000', '#03C988', '#F6C90E',]);
        }
        return $this->chart->donutChart();
    }
}
