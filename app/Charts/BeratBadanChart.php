<?php

namespace App\Charts;

use App\Models\Timbangan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeratBadanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $timbanganData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at')
            ->pluck('bb')
            ->toArray();
        $tanggalData = Timbangan::where('anak_id', $id)
            ->orderBy('created_at') // Mengurutkan data berdasarkan tanggal
            ->pluck('created_at')
            ->map->format('j M')
            ->toArray();

        return $this->chart->lineChart()
            ->addData('Berat Badan', $timbanganData)
            ->setXAxis($tanggalData)
            ->setHeight(250)
            ->setColors(['#4fc1c1'])
            ->setMarkers(['#4fc1c1'], 5, 10)
            ->setGrid();
    }
}