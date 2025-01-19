<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Widgets\BarChartWidget;

class TotalItemsChart extends BarChartWidget
{
    protected static ?string $heading = 'Total Items by Category';

    protected function getData(): array
    {
        $data = Item::selectRaw('categories.name, COUNT(items.id) as total')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->pluck('total', 'categories.name');

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Items',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => '#4caf50',
                ],
            ],
        ];
    }
}
