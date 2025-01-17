<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Item;
use Filament\Tables;
use App\Models\StockOut;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StockOutResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StockOutResource\RelationManagers;

class StockOutResource extends Resource
{
    protected static ?string $model = StockOut::class;
    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-up';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('item_id')
                ->label('Item')
                ->relationship('item', 'name')
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
        return $table
            ->columns([
                TextColumn::make('item.name')->label('Item'),
                TextColumn::make('quantity')->label('Quantity'),
                TextColumn::make('transaction_date')->label('Transaction Date'),
            ])
            ->filters([
                //
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
        // Decrement the stock in the Item model when StockOut is created
        $item = Item::find($data['item_id']);
        if ($item->stock < $data['quantity']) {
            throw new \Exception('Stock is insufficient for this operation.');
        }

        $item->decrement('stock', $data['quantity']);

        return $data;
    }

    protected static function mutateFormDataBeforeDelete(Builder $record): void
    {
        // Increment the stock when StockOut is deleted
        $item = Item::find($record->item_id);
        $item->increment('stock', $record->quantity);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStockOuts::route('/'),
            'create' => Pages\CreateStockOut::route('/create'),
            'edit' => Pages\EditStockOut::route('/{record}/edit'),
        ];
    }
}
