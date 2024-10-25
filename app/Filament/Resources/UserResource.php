<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-circle';

    protected static ?string $navigationLabel = 'Manajemen User';

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                            ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                            ->dehydrated(fn ($state) => filled($state))
                            ->minLength(8)
                            ->maxLength(255),
                        Select::make('role')
                            ->label('Role')
                            ->options([
                                0 => 'Admin',
                                1 => 'Seller',
                                2 => 'Customer',
                            ])
                            ->required()
                            ->reactive(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->alignCenter()
                ->searchable(),
                TextColumn::make('email')
                ->searchable()
                ->alignCenter(),
                TextColumn::make('role')
                ->label('Role')
                ->sortable()
                ->badge()
                ->color(function ($state) {
                    if ($state == 0) {
                        return 'success';
                    } elseif ($state == 1) {
                        return 'warning';
                    } else {
                        return 'danger';
                    }
                })
                ->formatStateUsing(function ($state) {
                    if ($state == 0) {
                        return 'Admin';
                    } elseif ($state == 1) {
                        return 'Seller';
                    } else {
                        return 'Customer';
                    }
                })
                ->searchable()
                ->alignCenter(),
                TextColumn::make('created_at')
                ->alignCenter()
                ->sortable()
                ->date('d F Y'),
            ])
            ->filters([
                SelectFilter::make('Role')
                    ->options([
                        0 => 'Admin',
                        1 => 'Seller',
                        2 => 'Customer',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
