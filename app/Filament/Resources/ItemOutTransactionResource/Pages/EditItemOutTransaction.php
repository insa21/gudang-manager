<?php

namespace App\Filament\Resources\ItemOutTransactionResource\Pages;

use App\Filament\Resources\ItemOutTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemOutTransaction extends EditRecord
{
    protected static string $resource = ItemOutTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
