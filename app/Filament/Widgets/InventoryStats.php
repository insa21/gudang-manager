<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Widgets\BarChartWidget;


class InventoryStats extends BarChartWidget
{
    protected static ?string $heading = 'Inventory Statistics';

    protected function getData(): array
    {
        $categories = Item::with('category')
            ->get()
            ->groupBy('category.name')
            ->map(fn($items) => $items->sum('stock'));

        return [
            'datasets' => [
                [
                    'label' => 'Stock by Category',
                    'data' => $categories->values()->toArray(),
                ],
            ],
            'labels' => $categories->keys()->toArray(),
        ];
    }


    protected function getType(): string
    {
        return 'bar';
    }
}
