<?php

namespace App\Filament\Resources\ItemInTransactionResource\Pages;

use App\Filament\Resources\ItemInTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemInTransactions extends ListRecords
{
    protected static string $resource = ItemInTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
