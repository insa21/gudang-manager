<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Widgets\BarChartWidget;

class InventoryStats extends BarChartWidget
{
    protected static ?string $heading = 'Inventory Statistics';

    protected function getData(): array
    {
        // Ambil data item dengan kategori dan stok
        $categories = Item::with('category')
            ->get()
            ->groupBy('category.name')
            ->map(function ($items, $category) {
                return [
                    'total_stock' => $items->sum('stock'),
                    'items' => $items->map(fn($item) => [
                        'name' => $item->name,
                        'stock' => $item->stock,
                    ]),
                ];
            });

        return [
            'datasets' => [
                [
                    'label' => 'Stock by Category',
                    'data' => $categories->map(fn($data) => $data['total_stock'])->values()->toArray(),
                ],
            ],
            'labels' => $categories->keys()->toArray(),
            'details' => $categories->map(fn($data) => $data['items'])->toArray(), // Tambahan untuk data detail
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
