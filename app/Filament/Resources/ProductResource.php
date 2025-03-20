<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Products Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Product')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Product::class, 'slug', ignoreRecord: true),
                                Forms\Components\Textarea::make('short_description')
                                    ->required()
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('description')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\Select::make('product_type')
                                    ->options([
                                        'physical' => 'Physical',
                                        'digital' => 'Digital',
                                        'service' => 'Service',
                                    ])
                                    ->required(),
                                Forms\Components\Toggle::make('status')
                                    ->label('Active')
                                    ->default(true),
                                Forms\Components\Toggle::make('featured')
                                    ->default(false),
                                Forms\Components\Select::make('categories')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('type')
                                            ->default('product')
                                            ->required(),
                                        Forms\Components\Textarea::make('description')
                                            ->maxLength(1000),
                                        Forms\Components\ColorPicker::make('bg')
                                            ->label('Background Color'),
                                        Forms\Components\ColorPicker::make('text')
                                            ->label('Text Color'),
                                    ])
                                    ->columnSpanFull(),
                                Forms\Components\Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('description')
                                            ->maxLength(1000),
                                        Forms\Components\ColorPicker::make('bg')
                                            ->label('Background Color'),
                                        Forms\Components\ColorPicker::make('text')
                                            ->label('Text Color'),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Media')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('featured_image')
                                    ->collection('featured_image')
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('800')
                                    ->helperText('Upload the featured image for this product.')
                                    ->columnSpanFull(),
                                SpatieMediaLibraryFileUpload::make('screenshots')
                                    ->collection('screenshots')
                                    ->multiple()
                                    ->reorderable()
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('800')
                                    ->helperText('Upload screenshots or additional images for this product.')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(160),
                                Forms\Components\TagsInput::make('meta_keywords')
                                    ->label('Meta Keywords'),
                                Forms\Components\TextInput::make('og_title')
                                    ->label('OG Title')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('og_description')
                                    ->label('OG Description')
                                    ->maxLength(160),
                                SpatieMediaLibraryFileUpload::make('og_image')
                                    ->collection('og_image')
                                    ->label('OG Image')
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('1:1')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('featured_image')
                    ->collection('featured_image')
                    ->conversion('thumb')
                    ->square()
                    ->label('Image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'physical' => 'success',
                        'digital' => 'info',
                        'service' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Active'),
                Tables\Columns\ToggleColumn::make('featured'),
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
                Tables\Filters\SelectFilter::make('product_type')
                    ->options([
                        'physical' => 'Physical',
                        'digital' => 'Digital',
                        'service' => 'Service',
                    ]),
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Active')
                    ->indicator('Active'),
                Tables\Filters\TernaryFilter::make('featured')
                    ->indicator('Featured'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\FeaturesRelationManager::class,
            RelationManagers\PricingPlansRelationManager::class,
            RelationManagers\TestimonialsRelationManager::class,
            RelationManagers\FaqsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
