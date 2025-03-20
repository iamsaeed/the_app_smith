<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers\PricingPlans\PlanFeaturesRelationManager;

class PricingPlansRelationManager extends RelationManager
{
    protected static string $relationship = 'pricingPlans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('duration')
                    ->maxLength(50)
                    ->helperText('E.g., "Monthly", "Annual", "One-time"'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(500)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_popular')
                    ->label('Popular Plan')
                    ->helperText('Highlight this plan as the popular choice')
                    ->default(false),
                Forms\Components\Toggle::make('status')
                    ->label('Active')
                    ->default(true),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->rules(['integer', 'min:0'])
                    ->label('Sort Order'),
                Forms\Components\Section::make('Plan Features')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                            ->relationship('features')
                            ->schema([
                                Forms\Components\TextInput::make('feature_description')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Forms\Components\Toggle::make('is_included')
                                    ->label('Included')
                                    ->default(true),
                                Forms\Components\TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0)
                                    ->rules(['integer', 'min:0'])
                                    ->label('Sort Order'),
                            ])
                            ->orderable('sort_order')
                            ->defaultItems(0)
                            ->columnSpanFull()
                    ])
                    ->collapsible()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\IconColumn::make('is_popular')
                    ->boolean()
                    ->label('Popular')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('sort_order');
    }
}
