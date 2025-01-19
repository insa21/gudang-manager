<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Widgets\ChartWidget;

class TotalStockChart extends ChartWidget
{
    protected static ?string $heading = 'Total Stock Chart';

    protected function getData(): array
    {
        $categories = Item::with('category')
            ->get()
            ->groupBy('category.name')
            ->map(fn($items) => $items->sum('stock'));

        return [
            'datasets' => [
                [
                    'label' => 'Total Stock by Category',
                    'data' => $categories->values()->toArray(),
                ],
            ],
            'labels' => $categories->keys()->toArray(),
        ];
    }

    protected function getChartType(): string
    {
        return $this->getChartChoice(); // Dynamically choose chart type
    }

    private function getChartChoice(): string
    {
        // Replace with actual user choice mechanism
        return [
            'bar' => 0,
            'bubble' => 1,
            'doughnut' => 2,
            'line' => 3,
            'pie' => 4,
            'polarArea' => 5,
            'radar' => 6,
            'scatter' => 7,
        ][request('chart_type', 'bar')]; // Default is bar chart
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
