<?php
namespace App\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;
use Illuminate\View\View;
use Filament\Support\Concerns\HasLineClamp;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Contracts\HasTable;

class ContactInfoColumn extends Column
{
    public function render(): View
    {
        // Fetch the necessary fields from the record
        $data = [
            'email' => $this->record->email,
            'telephone_number' => $this->record->telephone_number,
            'cellphone_number' => $this->record->cellphone_number,
            'home_address' => $this->record->home_address,
            'country' => $this->record->country,
            'city' => $this->record->city,
            'province' => $this->record->province,
            'region' => $this->record->region,
            'postal_code' => $this->record->postal_code,
            'linkedin_account_link' => $this->record->linkedin_account_link,
        ];

        // Return the view with the data
       return view('resources.views', ['data' => $data]);
    }
}