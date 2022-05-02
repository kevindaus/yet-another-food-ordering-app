<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodResource\Pages;
use App\Filament\Resources\FoodResource\RelationManagers;
use App\Models\Food;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class FoodResource extends Resource
{
    protected static ?string $model = Food::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $layout = Forms\Components\Card::class;

        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        $layout::make()->schema([
                            Forms\Components\TextInput::make('name')
                                ->label("Name")
                                ->required()
                                ->helperText("Name of the food/delicacy"),
                            Forms\Components\MarkdownEditor::make('description')->helperText("Describe the food")->required(),
                            Forms\Components\TextInput::make('price')
                                ->required()
                                ->label("Price"),
                        ])->columns(1)
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        $layout::make()
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Created at')
                                    ->content(fn(?Food $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Last modified at')
                                    ->content(fn(?Food $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                            ])
                            ->columns(1),
                    ])->columnSpan(1),
            ])->columns(3);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label("Name")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label("Price")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\FoodReviewsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFood::route('/'),
            'create' => Pages\CreateFood::route('/create'),
            'edit' => Pages\EditFood::route('/{record}/edit'),
        ];
    }
}
