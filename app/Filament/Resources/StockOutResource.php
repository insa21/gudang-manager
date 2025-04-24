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
use App\Filament\Resources\StockOutResource\Pages;
use Filament\Notifications\Notification;

class StockOutResource extends Resource
{
    protected static ?string $model = StockOut::class;
    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-up';
    protected static ?string $navigationLabel = 'Keluar';
    protected static ?string $slug = 'transaksi-keluar';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $modelLabel = 'Keluar';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('item_id')
                ->label('Item')
                ->relationship('item', 'name')
                ->required(),
            TextInput::make('quantity')
                ->label('Jumlah')
                ->numeric()
                ->required()
                ->afterStateUpdated(function (callable $set, $state, $get) {
                    $item = Item::find($get('item_id'));
                    if ($item && $state > $item->stock) {
                        $set('quantity', $item->stock); // Set jumlah sesuai stok yang tersedia
                        // Kirim pemberitahuan
                        Notification::make()
                            ->title('Stok Tidak Cukup')
                            ->body('Jumlah yang Anda masukkan melebihi stok yang tersedia (' . $item->stock . '). Jumlah telah disesuaikan.')
                            ->warning()
                            ->send();
                        return "Jumlah tidak boleh melebihi stok yang tersedia: {$item->stock}.";
                    }
                    return null;
                }),
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
                TextColumn::make('item.name')->label('Item'),
                TextColumn::make('quantity')->label('Jumlah'),
                TextColumn::make('transaction_date')->label('Tanggal Transaksi'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    protected static function mutateFormDataBeforeDelete($record): void
    {
        // Mendapatkan data item yang dihapus
        $item = Item::find($record->item_id);

        // Validasi jika item tidak ditemukan
        if (!$item) {
            throw new \Exception('Item tidak ditemukan.');
        }

        // Tambah stok saat StockOut dihapus
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
