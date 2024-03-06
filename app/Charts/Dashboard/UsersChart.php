<?php

namespace App\Charts\Dashboard;


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
        $regions = DB::table('regions')
            ->select(
                'regions.name',
                DB::raw('COUNT(users.id) as total_users'),
                DB::raw('COUNT(anaks.id) as total_anak')
            )
            ->leftJoin('users', 'regions.id', '=', 'users.region_id')
            ->leftJoin('anaks', 'users.id', '=', 'anaks.user_id')
            ->where('users.admin', '!=', 1)
            ->groupBy('regions.id', 'regions.name')
            ->get();

        $regionNames = $regions->pluck('name')->toArray();
        $totalUsers = $regions->pluck('total_users')->toArray();
        $totalAnak = $regions->pluck('total_anak')->toArray();

        return $this->chart->barChart()
            ->addData('User', $totalUsers)
            ->addData('Anak',  $totalAnak)
            ->setColors(['#FFC107', '#D32F2F'])
            ->setXAxis($regionNames);
    }
}
