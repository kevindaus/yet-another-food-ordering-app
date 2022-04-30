<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\Food;
use App\Models\OrderItem;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrderItemsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'orderItems';

    protected static ?string $recordTitleAttribute = 'food_id';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Select::make('food_id')
                    ->label('Food')
                    ->options(Food::query()->pluck('name','id'))
                    ->required()
                    ->reactive()
                    ->afterStateUpdated( fn($state , callable $set,callable $get) => $set('unit_price', Food::find($state)?->price  ?? 0)  )
                    ->columnSpan(1),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->mask(fn(Forms\Components\TextInput\Mask $mask) => $mask->numeric()->integer() )
                    ->default(1)
                    ->numeric()->columnSpan(1),
                Forms\Components\TextInput::make('unit_price')
                    ->label('Total')
                    ->disabled()
                    ->default(1)
                    ->numeric()->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('food.name')
                    ->label("Food")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('food.price')
                    ->label("Price")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label("Quantity")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('Sub Total')
                    ->label("Quantity")
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ]);
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['food']);
    }
}
