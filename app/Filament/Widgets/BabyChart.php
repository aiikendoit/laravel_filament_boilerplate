<?php

namespace App\Filament\Widgets;

use App\Models\Baby;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BabyChart extends ChartWidget
{
    protected static ?string $heading = 'Baby Bar Chart';
    protected static string $color = 'info';
    protected static ?string $pollingInterval = '10s';
    protected static ?string $maxHeight = '300px';
    protected static bool $isLazy = true;
    protected function getData(): array
    {
        $data = Trend::model(Baby::class)

            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // ->between(
        //     start: now()->startOfMonth(),
        //     end: now()->endOfMonth(),
        // )
        // ->perDay()
        // ->count();


        return [
            'datasets' => [
                [
                    'label' => 'Registered',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
    // protected static ?array $options = [
    //     'plugins' => [
    //         'legend' => [
    //             'display' => false,
    //         ],
    //     ],
    // ];

    public function getDescription(): ?string
    {
        return 'The number of babies registered per month.';
    }
}
