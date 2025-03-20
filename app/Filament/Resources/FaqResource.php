<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Collection;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('FAQ Content')
                    ->schema([
                        Forms\Components\TextInput::make('question')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('answer')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Select::make('faqable_type')
                            ->label('Related To')
                            ->options([
                                'App\\Models\\Product' => 'Product',
                                null => 'General',
                            ])
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('faqable_id', null)),

                        Forms\Components\Select::make('faqable_id')
                            ->label('Select Product')
                            ->options(function (callable $get) {
                                $type = $get('faqable_type');

                                if (!$type || $type !== 'App\\Models\\Product') {
                                    return [];
                                }

                                return Product::pluck('name', 'id');
                            })
                            ->searchable()
                            ->visible(fn (callable $get) => $get('faqable_type') === 'App\\Models\\Product'),

                        Forms\Components\Toggle::make('status')
                            ->label('Active')
                            ->default(true),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->rules(['integer', 'min:0'])
                            ->label('Sort Order'),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->sortable()
                    ->words(7),
                Tables\Columns\TextColumn::make('faqable_type')
                    ->label('Type')
                    ->formatStateUsing(fn ($state) => $state ? 'Product' : 'General')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'info'),
                Tables\Columns\TextColumn::make('faqable.name')
                    ->label('Product')
                    ->visible(fn ($record) => $record && $record->faqable_type === 'App\\Models\\Product')
                    ->default('-'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('faqable_type')
                    ->label('Type')
                    ->options([
                        'App\\Models\\Product' => 'Product',
                        null => 'General',
                    ])
                    ->placeholder('All Types'),
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Active')
                    ->indicator('Active'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Activate')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn (Collection $records) => $records->each(fn ($record) => $record->update(['status' => true]))),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(fn (Collection $records) => $records->each(fn ($record) => $record->update(['status' => false]))),
                ]),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
