<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Item;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ItemResource\Pages;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationLabel = 'Barang';
    protected static ?string $pluralLabel = 'Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),

                TextInput::make('sku')
                    ->label('SKU')
                    ->required()
                    ->unique(Item::class, 'sku')
                    ->maxLength(100),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3),

                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->default(0),

                TextInput::make('unit')
                    ->label('Satuan')
                    ->maxLength(50)
                    ->placeholder('pcs, box, kg, dll.')
                    ->required(),

                FileUpload::make('photo')
                    ->label('Foto Barang')
                    ->image()
                    ->directory('items/photos')
                    ->maxSize(2048), // Maksimum 2MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Barang')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('sku')
                    ->label('SKU')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->sortable(),

                TextColumn::make('unit')
                    ->label('Satuan')
                    ->sortable(),

                ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public')
                    ->sortable(),
            ])
            ->defaultSort('name');
    }

    public static function getRelations(): array
    {
        return [
            // Jika ingin menambahkan relasi nanti
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
