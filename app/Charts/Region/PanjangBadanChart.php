<?php

namespace App\Charts\Region;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PanjangBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($panjang_badans): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $jumlahPB = count($panjang_badans);

        if ($jumlahPB > 0) {
            $persentasePendek = ($panjang_badans->filter(function ($pb) {
                return $pb < 44.2;
            })->count() / $jumlahPB);

            $persentaseNormal = ($panjang_badans->filter(function ($pb) {
                return $pb >= 44.2 && $pb < 70.5;
            })->count() / $jumlahPB);

            $persentaseTinggi = ($panjang_badans->filter(function ($pb) {
                return $pb >= 70.5;
            })->count() / $jumlahPB);

            $persentasePendek = round($persentasePendek * 100, 1);
            $persentaseNormal = round($persentaseNormal * 100, 1);
            $persentaseTinggi = round($persentaseTinggi * 100, 1);

            $kategoriPB = ['Pendek', 'Normal', 'Tinggi'];

            return $this->chart->donutChart()
                ->addData([$persentasePendek, $persentaseNormal, $persentaseTinggi])
                ->setLabels($kategoriPB)
                ->setColors(['#FF0000', '#03C988', '#F6C90E',]);
        }
        return $this->chart->donutChart();
    }
}
