<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Imports\ImportUsers;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('Import User')
                ->label('Import User')
                ->color('danger')
                ->form([
                    FileUpload::make('attachment')
                ])
                ->action(function (array $data) {
                    $file = Storage::path($data['attachment']);

                    Excel::import(new ImportUsers, $file);

                    Notification::make()
                        ->title('Data User Imported')
                        ->success()
                        ->send();
                }),
                Action::make('download template')
                ->label('Download Template')
                ->color('success')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {
                    return response()->download(public_path('general/templatekantin.xlsx'));
                })
        ];
    }
}
