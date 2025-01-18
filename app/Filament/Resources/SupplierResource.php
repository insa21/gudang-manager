<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pemasok';
    protected static ?string $slug = 'Lainnya-pemasok';
    protected static ?string $modelLabel = 'Pemasok';
    protected static ?string $navigationGroup = 'Lainnya';
    protected static ?int $navigationSort = 1;

    /**
     * Define form schema
     */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label('Nama'),

            Forms\Components\TextInput::make('contact')
                ->maxLength(255)
                ->default(null)
                ->label('Kontak'),

            Forms\Components\Textarea::make('address')
                ->label('Alamat')
                ->maxLength(1000),
        ]);
    }

    /**
     * Define table schema
     */
    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->searchable(),

            Tables\Columns\TextColumn::make('contact')
                ->label('Kontak')
                ->searchable(),

            Tables\Columns\TextColumn::make('address')
                ->label('Alamat')
                ->limit(50),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Diperbarui Pada')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
            ->filters([
                Tables\Filters\TrashedFilter::make(), // Filter untuk data yang dihapus secara soft delete
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\RestoreAction::make(), // Opsi untuk mengembalikan data yang dihapus
                Tables\Actions\ForceDeleteAction::make(), // Opsi untuk menghapus data secara permanen
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(), // Bulk action untuk restore
                Tables\Actions\ForceDeleteBulkAction::make(), // Bulk action untuk force delete
            ]);
    }

    /**
     * Define relations
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * Define pages for this resource
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
