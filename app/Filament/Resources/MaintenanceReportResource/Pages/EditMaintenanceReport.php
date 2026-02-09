<?php

namespace App\Filament\Resources\MaintenanceReportResource\Pages;

use App\Filament\Resources\MaintenanceReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaintenanceReport extends EditRecord
{
    protected static string $resource = MaintenanceReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
