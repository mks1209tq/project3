<?php

namespace App\Filament\Resources\OrgResource\Pages;

use App\Filament\Resources\OrgResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrg extends ViewRecord
{
    protected static string $resource = OrgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
