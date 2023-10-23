<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class TotalClientSatisfaction extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->options([
            'responsive' => true,
            'maintainAspectRatio' => false,
        ]);

        $this->labels(['Strongly Agree', 'Agree', 'Neither Agree Or Disagree', 'Disagree', 'Strongly Disagree', 'Not Applicable']);

        // Add a Pie Chart
        $this->dataset('Client Satisfaction (Pie Chart)', 'pie', [85, 70, 60, 40, 20, 12])
            ->backgroundColor(['#FF5733', '#FFDB58', '#4EEC4E', '#33B5FF', '#DF33FF']);
        // ->hoverBackgroundColor(['#FF5733', '#FFDB58', '#4EEC4E', '#33B5FF', '#DF33FF']);
    }
}
