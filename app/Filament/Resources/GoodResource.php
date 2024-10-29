<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoodResource\Pages;
use App\Filament\Resources\GoodResource\RelationManagers;
use App\Models\Good;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GoodResource extends Resource
{
    protected static ?string $model = Good::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')
                    ->numeric()
                    ->disabled()
                    ->visibleOn('edit')
                    ->placeholder('Для получения id записи, её сперва нужно создать')
                    ->default(request()->route()->parameter('record'))
                    ->label('id'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Название')
                    ->maxLength(255),
                Forms\Components\Textarea::make('desc')
                    ->required()
                    ->label('Описание')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->label('Цена')
                    ->numeric()
                    ->prefix('$'),
                Select::make('category')
                    ->placeholder('Выберите категорию')
                    ->preload()
                    ->required()
                    ->native(false)
                    ->relationship('category', 'name')
                    ->label('Категория'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')

                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->label('Цена')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListGoods::route('/'),
            'create' => Pages\CreateGood::route('/create'),
            'edit' => Pages\EditGood::route('/{record}/edit'),
        ];
    }
}
