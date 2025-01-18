<?php

namespace App\Filament\Resources;

use App\Models\Item;
use App\Models\StockIn;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\StockInResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockInResource extends Resource
{
    protected static ?string $model = StockIn::class;
    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-down';
    protected static ?string $navigationLabel = 'Masuk';
    protected static ?string $slug = 'transaksi-masuk';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $modelLabel = 'Masuk';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('item_id')
                ->label('Barang')
                ->options(Item::all()->pluck('name', 'id'))
                ->required(),

            Select::make('supplier_id')
                ->label('Supplier')
                ->relationship('supplier', 'name')
                ->required(),

            TextInput::make('quantity')
                ->label('Jumlah')
                ->numeric()
                ->required(),

            DatePicker::make('transaction_date')
                ->label('Tanggal Transaksi')
                ->default(now())
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item.name')
                    ->label('Barang')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('supplier.name')
                    ->label('Supplier')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->sortable(),

                TextColumn::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->sortable(),

                TextColumn::make('deleted_at')
                    ->label('Tanggal Dihapus')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        $item = Item::find($data['item_id']);
        $item->increment('stock', $data['quantity']);

        return $data;
    }

    protected static function mutateFormDataBeforeDelete(Builder $record): void
    {
        $item = Item::find($record->item_id);
        $item?->decrement('stock', $record->quantity);
    }

    protected static function mutateFormDataBeforeRestore(Builder $record): void
    {
        $item = Item::find($record->item_id);
        $item?->increment('stock', $record->quantity);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScope(SoftDeletingScope::class);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStockIns::route('/'),
            'create' => Pages\CreateStockIn::route('/create'),
            'edit' => Pages\EditStockIn::route('/{record}/edit'),
        ];
    }
}
