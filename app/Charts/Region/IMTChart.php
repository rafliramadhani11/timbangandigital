<?php

namespace App\Charts\Region;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class IMTChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($indeks_massa_tubuhs): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $jumlahIMT = count($indeks_massa_tubuhs);

        if ($jumlahIMT > 0) {
            $persentaseKurus = ($indeks_massa_tubuhs->filter(function ($imt) {
                return $imt < 18.5;
            })->count() / $jumlahIMT);
            $persentaseKurus = round($persentaseKurus * 100, 1);
        }

        if ($jumlahIMT > 0) {
            $persentaseNormal = ($indeks_massa_tubuhs->filter(function ($imt) {
                return $imt >= 18.5 && $imt < 24.9;
            })->count() / $jumlahIMT);
            $persentaseNormal = round($persentaseNormal * 100, 1);
        }

        if ($jumlahIMT > 0) {
            $persentaseGemuk = ($indeks_massa_tubuhs->filter(function ($imt) {
                return $imt >= 25;
            })->count() / $jumlahIMT);
            $persentaseGemuk = round($persentaseGemuk * 100, 1);
        }


        $kategoriIMT = ['Wasted', 'Normal', 'Obesitas'];


        return $this->chart->donutChart()
            ->addData([$persentaseKurus, $persentaseNormal, $persentaseGemuk])
            ->setLabels($kategoriIMT);
    }
}
