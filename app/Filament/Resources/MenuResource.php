<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Food;
use App\Models\Menu;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use phpDocumentor\Reflection\Types\Integer;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

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
                                ->required(),
                            Forms\Components\MarkdownEditor::make('description'),
                            Forms\Components\Hidden::make('restaurant_id')->default( fn(?Menu $menu): int => $menu?->restaurant_id ?: auth()->user()->id   )
                        ])->columns(1)
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        $layout::make()->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Created at')
                                ->content(fn(?Menu $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn(?Menu $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                        ])->columns(1)
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
//    public static function getEloquentQuery(): Builder {
//        return Menu::query();
//    }
}
