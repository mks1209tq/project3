<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Spatie\Activitylog\Models\Activity as Activity;

use App\Filament\Clusters\System;



class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;
    
    protected static ?string $cluster = System::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('log_name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('subject_type'),
                Tables\Columns\TextColumn::make('subject_id'),
                Tables\Columns\TextColumn::make('causer.name')
                    ->label('Causer'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('log_name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'view' => Pages\ViewActivity::route('/{record}'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }
    
}
