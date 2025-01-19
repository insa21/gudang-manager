<?php

namespace App\Filament\Widgets;

use App\Models\Supplier;
use Filament\Widgets\PieChartWidget;

class SupplierTrends extends PieChartWidget
{
    protected static ?string $heading = 'Distribusi Pemasok';

    // Atur lebar maksimum widget
    protected static ?string $maxWidth = 'sm';

    protected function getData(): array
    {
        $data = Supplier::query()
            ->selectRaw('address, COUNT(*) as total')
            ->groupBy('address')
            ->pluck('total', 'address');

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [
                [
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => ['#4caf50', '#ff6384', '#36a2eb', '#ffce56'],
                ],
            ],
        ];
    }
}
