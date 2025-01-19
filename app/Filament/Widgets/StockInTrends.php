<?php


namespace App\Filament\Widgets;

use Flowframe\Trend\Trend;
use Filament\Widgets\LineChartWidget;
use App\Models\StockIn; // Model untuk barang masuk

class StockInTrends extends LineChartWidget
{
    protected static ?string $heading = 'Tren Barang Masuk';

    protected function getData(): array
    {
        // Ambil data trend berdasarkan transaction_date
        $trend = Trend::model(StockIn::class)
            ->dateColumn('transaction_date')
            ->between(
                start: now()->subDays(30), // 30 hari terakhir
                end: now()
            )
            ->perDay() // Mengelompokkan data per hari
            ->count('transaction_date'); // Hitung berdasarkan kolom transaction_date

        return [
            'labels' => $trend->map(fn($data) => \Carbon\Carbon::parse($data->date)->format('d M'))->toArray(),
            'datasets' => [
                [
                    'label' => 'Barang Masuk',
                    'data' => $trend->map(fn($data) => $data->aggregate)->toArray(),
                    'borderColor' => '#4caf50',
                    'backgroundColor' => 'rgba(76, 175, 80, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
        ];
    }
}
