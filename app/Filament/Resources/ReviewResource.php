<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\FoodReview;
use App\Models\Order;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ReviewResource extends Resource
{
    protected static ?string $model = FoodReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        $layout = Forms\Components\Card::class;
        return $form
            ->schema([
               Forms\Components\Group::make()->schema([
                   $layout::make()->schema([
                       Forms\Components\TextInput::make('name')
                           ->label("Name")
                           ->required()
                           ->helperText("Name of the food/delicacy"),

                   ])->columns(1)
               ])->columnSpan(2) ,
                Forms\Components\Group::make()
                    ->schema([
                        $layout::make()->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Reviewed At')
                                ->content(fn(?Order $record): string => $record ? $record->order_time->diffForHumans() : '-'),
                        ])->columns(1)
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.fullname')
                    ->label("Customer")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('content')
                    ->label("Review")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label("Date Sent")
                    ->searchable()
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
            'view' => Pages\EditReview::route('/{record}/view'),
        ];
    }
}
