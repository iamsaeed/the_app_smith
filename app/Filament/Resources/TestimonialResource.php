<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make('Customer Information')
                            ->schema([
                                Forms\Components\TextInput::make('customer_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('customer_position')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('customer_company')
                                    ->maxLength(100),
                                SpatieMediaLibraryFileUpload::make('avatar')
                                    ->collection('avatar')
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('1:1')
                                    ->imageResizeTargetWidth('200')
                                    ->imageResizeTargetHeight('200')
                                    ->helperText('Upload customer avatar')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->columnSpan(['lg' => 1]),

                        Forms\Components\Section::make('Testimonial Content')
                            ->schema([
                                Forms\Components\Textarea::make('comment')
                                    ->required()
                                    ->rows(5)
                                    ->columnSpanFull(),
                                Forms\Components\Select::make('rating')
                                    ->label('Rating (1-5 stars)')
                                    ->options([
                                        '1' => '1 star',
                                        '1.5' => '1.5 stars',
                                        '2' => '2 stars',
                                        '2.5' => '2.5 stars',
                                        '3' => '3 stars',
                                        '3.5' => '3.5 stars',
                                        '4' => '4 stars',
                                        '4.5' => '4.5 stars',
                                        '5' => '5 stars',
                                    ])
                                    ->default('5'),
                            ])
                            ->columnSpan(['lg' => 1]),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Display Options')
                    ->schema([
                        Forms\Components\Select::make('testimonialable_type')
                            ->label('Related To')
                            ->options([
                                'App\\Models\\Product' => 'Product',
                                null => 'General',
                            ])
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('testimonialable_id', null)),

                        Forms\Components\Select::make('testimonialable_id')
                            ->label('Select Product')
                            ->options(function (callable $get) {
                                $type = $get('testimonialable_type');

                                if (!$type || $type !== 'App\\Models\\Product') {
                                    return [];
                                }

                                return Product::pluck('name', 'id');
                            })
                            ->searchable()
                            ->visible(fn (callable $get) => $get('testimonialable_type') === 'App\\Models\\Product'),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),

                        Forms\Components\Toggle::make('status')
                            ->label('Active')
                            ->default(true),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->rules(['integer', 'min:0'])
                            ->label('Sort Order'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('avatar')
                    ->collection('avatar')
                    ->conversion('thumb')
                    ->circular()
                    ->defaultImageUrl(fn () => asset('images/placeholder-avatar.jpg')),
                Tables\Columns\TextColumn::make('customer_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer_company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('testimonialable_type')
                    ->label('Type')
                    ->formatStateUsing(fn ($state) => $state ? 'Product' : 'General')
                    ->badge(),
                Tables\Columns\TextColumn::make('rating')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('testimonialable_type')
                    ->label('Type')
                    ->options([
                        'App\\Models\\Product' => 'Product',
                        null => 'General',
                    ])
                    ->placeholder('All Types'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->indicator('Featured'),
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
                    Tables\Actions\BulkAction::make('markAsFeatured')
                        ->label('Mark as Featured')
                        ->icon('heroicon-o-star')
                        ->action(fn (Collection $records) => $records->each(fn ($record) => $record->update(['is_featured' => true]))),
                    Tables\Actions\BulkAction::make('markAsNotFeatured')
                        ->label('Remove Featured')
                        ->icon('heroicon-o-x-mark')
                        ->action(fn (Collection $records) => $records->each(fn ($record) => $record->update(['is_featured' => false]))),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
