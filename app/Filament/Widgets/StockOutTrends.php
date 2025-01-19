<?php


namespace App\Filament\Widgets;

use Flowframe\Trend\Trend;
use Filament\Widgets\LineChartWidget;
use App\Models\StockOut;

class StockOutTrends extends LineChartWidget
{
    protected static ?string $heading = 'Tren Barang Keluar';

    protected function getData(): array
    {
        // Mengambil data tren barang keluar per hari berdasarkan transaction_date selama 30 hari terakhir
        $trend = Trend::model(StockOut::class)
            ->dateColumn('transaction_date') // Gunakan kolom transaction_date
            ->between(
                start: now()->subDays(30),
                end: now(),
            )
            ->perDay() // Menggunakan interval harian
            ->count();

        return [
            'labels' => $trend->map(fn($data) => \Carbon\Carbon::parse($data->date)->format('d M'))->toArray(),
            'datasets' => [
                [
                    'label' => 'Barang Keluar',
                    'data' => $trend->map(fn($data) => $data->aggregate)->toArray(),
                    'borderColor' => '#ff6384', // Warna garis
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Warna area transparan
                    'fill' => true, // Memberikan area di bawah garis
                    'tension' => 0.4, // Membuat garis lebih halus
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Ubah ke line chart
    }
}
