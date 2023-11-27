<?php

namespace Luisprmat\FilamentToolkit\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Luisprmat\FilamentToolkit\Resources\UserResource;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
