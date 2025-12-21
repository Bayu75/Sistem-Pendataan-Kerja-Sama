<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class DistributionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        return $this->chart->pieChart()
            ->setTitle('Distribusi Kerja Sama')
            ->addData([331, 56, 407])
            ->setLabels([
                'Berlaku',
                'Akan Kadaluarsa',
                'Kadaluarsa'
            ]);
    }
}