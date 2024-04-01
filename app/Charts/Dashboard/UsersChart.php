<?php

namespace App\Charts\Dashboard;


use App\Models\User;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class UsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $totalUsersByRegion = Region::leftJoin('users', 'regions.id', '=', 'users.region_id')
            ->selectRaw('regions.name as region_name, COUNT(users.id) as total_users')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->pluck('total_users', 'region_name')
            ->toArray();

        $totalAnak = Region::leftJoin('users', 'regions.id', '=', 'users.region_id')
            ->leftJoin('anaks', 'users.id', '=', 'anaks.user_id')
            ->selectRaw('COUNT(anaks.id) as total_children')
            ->groupBy('regions.id')
            ->pluck('total_children')
            ->toArray();

        $regionNames = collect($totalUsersByRegion)->keys()->all();
        $usersByRegion = collect($totalUsersByRegion)->values()->all();

        return $this->chart->barChart()
            ->addData('User', $usersByRegion)
            ->addData('Anak',  $totalAnak)
            ->setColors(['#FFC107', '#D32F2F'])
            ->setXAxis($regionNames)
            ->setStroke(5, ['white']);
        // ->setGrid('gray', '0.1');
    }
}
