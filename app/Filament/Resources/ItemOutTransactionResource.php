<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ItemOutTransaction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ItemOutTransactionResource\Pages;

class ItemOutTransactionResource extends Resource
{
    protected static ?string $model = ItemOutTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-upload';

    protected static ?string $navigationLabel = 'Barang Keluar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('item_id')
                    ->label('Barang')
                    ->relationship('item', 'name')
                    ->required(),

                Forms\Components\TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),

                Forms\Components\DatePicker::make('transaction_date')
                    ->label('Tanggal Keluar')
                    ->required(),

                Forms\Components\Textarea::make('description')
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
                    ->searchable()
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label('Jumlah'),

                TextColumn::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->date(),

                TextColumn::make('description')
                    ->label('Keterangan')
                    ->limit(30),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItemOutTransactions::route('/'),
            'create' => Pages\CreateItemOutTransaction::route('/create'),
            'edit' => Pages\EditItemOutTransaction::route('/{record}/edit'),
        ];
    }
}
