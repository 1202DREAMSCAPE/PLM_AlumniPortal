<?php

namespace App\Filament\Exports;

use App\Models\User;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class UserExporter extends Exporter
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name'),
            ExportColumn::make('email'),
            ExportColumn::make('email_verified_at'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('SNum'),
            ExportColumn::make('Gender'),
            ExportColumn::make('LName'),
            ExportColumn::make('FName'),
            ExportColumn::make('MName'),
            ExportColumn::make('NameExt'),
            ExportColumn::make('MaidenName'),
            ExportColumn::make('Dept'),
            ExportColumn::make('Course'),
            ExportColumn::make('BDay'),
            ExportColumn::make('Graduated'),
            ExportColumn::make('POB'),
            ExportColumn::make('ContactNum'),
            ExportColumn::make('TelNum'),
            ExportColumn::make('Linkedin'),
            ExportColumn::make('Nationality'),
            ExportColumn::make('CivilStat'),
            ExportColumn::make('Address'),
            ExportColumn::make('Country'),
            ExportColumn::make('Province'),
            ExportColumn::make('Region'),
            ExportColumn::make('City'),
            ExportColumn::make('PostalCode'),
            ExportColumn::make('Skills'),
            ExportColumn::make('is_admin'),
        ];
    }

        public function getFileName(Export $export): string
            {
        return "AlumniRecord-{$export->getKey()}.csv";
        }
    public static function getNotificationTitle(Export $export): string
    {
        return 'Alumni Record Exported';
    }
    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your user export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
