<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Food;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use PHPUnit\TextUI\XmlConfiguration\Group;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        $layout = Forms\Components\Card::class;
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        $layout::make()->schema([
                            Forms\Components\TextInput::make('tracking_number')
                                ->default('ORD'.random_int(100000,999999))
                                ->disabled()
                                ->required(),
                            Forms\Components\Select::make('status')
                                ->options(Order::getAllOrderStatus())
                                ->required(),
                            Forms\Components\MarkdownEditor::make('notes')
                                ->columnSpan(2),
                        ])->columns(2) ,
                        $layout::make()->schema([
                            Forms\Components\HasManyRepeater::make('orderItems')
                                ->relationship('orderItems')
                                ->schema([
                                    Forms\Components\Select::make('food_id')
                                        ->label('Food')
                                        ->options(Food::query()->pluck('name','id'))
                                        ->required()
                                        ->reactive()
                                        ->afterStateUpdated( fn($state , callable $set) => $set('food_item_price', Food::find($state)?->price ?? 0)  )
                                        ->columnSpan(1),
                                    Forms\Components\TextInput::make('quantity')
                                        ->required()
                                        ->mask(fn(Forms\Components\TextInput\Mask $mask) => $mask->numeric()->integer() )
                                        ->default(1)
                                        ->numeric()->columnSpan(1),
                                    Forms\Components\TextInput::make('food_item_price')
                                        ->label('Price per item')
                                        ->disabled()
                                        ->required()
                                        ->default(1)
                                        ->numeric()->columnSpan(1),
                                ])
                                ->columns(3)
                        ])
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        $layout::make()->schema([
                            Forms\Components\TextInput::make('price')
                                ->required()
                                ->disabled()
                                ->label("Total"), // show this only
                        ])->columns(1),
                        $layout::make()->schema([
                            Forms\Components\BelongsToSelect::make('customer_id')
                                ->relationship('customer','fullName')
                                ->searchable()
                                ->preload()->columnSpan(2),
                        ])->columns(1),
                        $layout::make()->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Ordered At')
                                ->content(fn(?Order $record): string => $record ? $record->order_time->diffForHumans() : '-'),
                        ])->columns(1),


                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route("/{record}/view"),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),

        ];
    }
}
