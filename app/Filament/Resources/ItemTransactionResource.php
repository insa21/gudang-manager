<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ItemTransaction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\ItemTransactionResource\Pages;

class ItemTransactionResource extends Resource
{
    protected static ?string $model = ItemTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Transaksi Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('item_id')
                    ->label('Barang')
                    ->relationship('item', 'name')
                    ->required(),

                Select::make('transaction_type')
                    ->label('Jenis Transaksi')
                    ->options([
                        'in' => 'Barang Masuk',
                        'out' => 'Barang Keluar',
                    ])
                    ->required(),

                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),

                DatePicker::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->required(),

                Textarea::make('description')
                    ->label('Keterangan')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item.name')
                    ->label('Nama Barang')
                    ->searchable(),

                TextColumn::make('transaction_type')
                    ->label('Jenis Transaksi')
                    ->formatStateUsing(fn(string $state): string => $state === 'in' ? 'Barang Masuk' : 'Barang Keluar'),

                TextColumn::make('quantity')
                    ->label('Jumlah'),

                TextColumn::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->date(),

                TextColumn::make('description')
                    ->label('Keterangan')
                    ->limit(30),
            ])
            ->defaultSort('transaction_date', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItemTransactions::route('/'),
            'create' => Pages\CreateItemTransaction::route('/create'),
            'edit' => Pages\EditItemTransaction::route('/{record}/edit'),
        ];
    }
}
