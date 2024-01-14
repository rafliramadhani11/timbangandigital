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
        $jumlahAnak = count($berat_badans);

        $persentaseKurus = ($berat_badans->filter(function ($bb) {
            return $bb < 5.3;
        })->count() / $jumlahAnak);

        $persentaseNormal = ($berat_badans->filter(function ($bb) {
            return $bb >= 5.3 && $bb < 8.2;
        })->count() / $jumlahAnak);

        $persentaseObesitas = ($berat_badans->filter(function ($bb) {
            return $bb >= 8.2;
        })->count() / $jumlahAnak);

        $persentaseKurus = round($persentaseKurus * 100, 1);
        $persentaseNormal = round($persentaseNormal * 100, 1);
        $persentaseObesitas = round($persentaseObesitas * 100, 1);

        $kategoriBB = ['Kurus', 'Normal', 'Obesitas'];

        return $this->chart->donutChart()
            ->addData([$persentaseKurus, $persentaseNormal, $persentaseObesitas])
            ->setLabels($kategoriBB);
    }
}
