<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Item;
use Filament\Tables;
use App\Models\StockIn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StockInResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StockInResource\RelationManagers;

class StockInResource extends Resource
{
    protected static ?string $model = StockIn::class;
    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-down';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('item_id')
                ->label('Item')
                ->options(Item::all()->pluck('name', 'id'))
                ->required(),
            Select::make('supplier_id')
                ->label('Supplier')
                ->relationship('supplier', 'name')
                ->required(),
            TextInput::make('quantity')
                ->label('Quantity')
                ->numeric()
                ->required(),
            DatePicker::make('transaction_date')
                ->label('Transaction Date')
                ->default(now())
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('item.name')->label('Item'),
            TextColumn::make('supplier.name')->label('Supplier'),
            TextColumn::make('quantity')->label('Quantity'),
            TextColumn::make('transaction_date')->label('Transaction Date'),
        ])
            ->filters([
                Tables\Filters\TrashedFilter::make(), 
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        // Update the stock in the Item model when StockIn is created
        $item = Item::find($data['item_id']);
        $item->increment('stock', $data['quantity']);

        return $data;
    }

    protected static function mutateFormDataBeforeDelete(Builder $record): void
    {
        // Decrement the stock when StockIn is deleted
        $item = Item::find($record->item_id);
        $item->decrement('stock', $record->quantity);
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
