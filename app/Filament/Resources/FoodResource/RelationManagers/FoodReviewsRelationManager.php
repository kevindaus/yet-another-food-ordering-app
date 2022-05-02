<?php

namespace App\Filament\Resources\FoodResource\RelationManagers;

use App\Filament\Resources\ReviewResource;
use App\Models\FoodReview;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class FoodReviewsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'foodReviews';

    protected static ?string $recordTitleAttribute = 'content';

    public static function form(Form $form): Form
    {
        $layout = Forms\Components\Card::class;
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    $layout::make()->schema([
                        Forms\Components\BelongsToSelect::make('customer_id')
                            ->relationship('customer','fullName')
                            ->searchable()
                            ->required()
                            ->preload(),
                        Select::make('rating')
                            ->label("Rating")
                            ->options([
                                FoodReview::RATING_1 => 'Lowest',
                                FoodReview::RATING_2 => 'Low',
                                FoodReview::RATING_3 => 'Neutral',
                                FoodReview::RATING_4 => 'High',
                                FoodReview::RATING_5 => 'Very High',
                            ]),
                        Forms\Components\MarkdownEditor::make('content')->helperText("Describe the food")->required(),
                    ])->columns(1)
                ])->columnSpan(2) ,
                Forms\Components\Group::make()
                    ->schema([
                        $layout::make()->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Reviewed At')
                                ->content(fn(?FoodReview $record): string => $record ? $record->order_time->diffForHumans() : '-'),
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
}
