<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        $layout = Forms\Components\Card::class;
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\TextInput::make('first_name')
                        ->label("First Name")
                        ->required(),
                    Forms\Components\TextInput::make('last_name')
                        ->label("Last Name")
                        ->required(),
                    Forms\Components\TextInput::make('mobile_number')
                        ->label("Mobile#")
                        ->required(),
                    Forms\Components\TextInput::make('address_1')
                        ->label("Address 1")
                        ->required(),
                    Forms\Components\TextInput::make('address_2')
                        ->label("Address 2(optional)"),
                    Forms\Components\TextInput::make('province')
                        ->label("Province"),
                    Forms\Components\TextInput::make('address_location_latitude')
                        ->label("Address Location (Latitude)"),
                    Forms\Components\TextInput::make('address_location_longitude')
                        ->label("Address Location (Longitude)"),
                ])->columnSpan(2) ,
                Forms\Components\Group::make()->schema([
                    $layout::make()->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Reviewed At')
                            ->content(fn(?Customer $record): string => $record ? $record->order_time->diffForHumans() : '-'),
                    ])->columns(1)
                ])->columnSpan(1) ,
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label("First Name")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('last_name')
                    ->label("Last Name")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mobile_number')
                    ->label("Mobile #")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address_1')
                    ->label("Address 1")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address_2')
                    ->label("Address 2")
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
