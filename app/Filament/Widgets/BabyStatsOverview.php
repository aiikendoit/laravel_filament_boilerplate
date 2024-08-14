<?php

namespace App\Filament\Widgets;

use App\Models\Baby;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BabyStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total', Baby::count())
                ->description('Registered Babies')
                ->descriptionIcon('heroicon-o-circle-stack', IconPosition::Before)
                ->chart([1,3,5,10,20,40])
                ->color('success')

        ];
    }
}
