<?php

namespace App\Filament\Resources\ItemInTransactionResource\Pages;

use App\Filament\Resources\ItemInTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemInTransaction extends EditRecord
{
    protected static string $resource = ItemInTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
