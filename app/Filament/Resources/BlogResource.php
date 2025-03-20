<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Blog Management';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Blog Content')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\Textarea::make('excerpt')
                                    ->nullable()
                                    ->rows(3)
                                    ->helperText('A short summary of the blog post')
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('content')
                                    ->required()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('uploads/blogs/content')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Section::make('Media')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->collection('featured_image')
                                    ->disk('public')
                                    ->directory('uploads/blogs/featured')
                                    ->visibility('public')
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageEditor()
                                    ->helperText('Recommended size: 1200x630px'),

                                SpatieMediaLibraryFileUpload::make('gallery')
                                    ->label('Gallery Images')
                                    ->collection('gallery')
                                    ->multiple()
                                    ->reorderable()
                                    ->disk('public')
                                    ->directory('uploads/blogs/gallery')
                                    ->visibility('public')
                                    ->image()
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Section::make('SEO Information')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(70)
                                    ->helperText('Maximum 70 characters')
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->rows(2)
                                    ->maxLength(160)
                                    ->helperText('Maximum 160 characters')
                                    ->columnSpanFull(),

                                Forms\Components\TagsInput::make('meta_keywords')
                                    ->label('Meta Keywords')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('og_title')
                                    ->label('Open Graph Title')
                                    ->helperText('Leave blank to use Meta Title')
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('og_description')
                                    ->label('Open Graph Description')
                                    ->rows(2)
                                    ->helperText('Leave blank to use Meta Description')
                                    ->columnSpanFull(),

                                Forms\Components\FileUpload::make('og_image')
                                    ->label('Open Graph Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('uploads/blogs/og')
                                    ->helperText('Recommended size: 1200x630px. Leave blank to use Featured Image.')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('status')
                                    ->label('Published')
                                    ->default(false),

                                Forms\Components\Toggle::make('featured')
                                    ->label('Featured')
                                    ->default(false),

                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Publish Date')
                                    ->nullable()
                                    ->default(now()),
                            ]),

                        Forms\Components\Section::make('Relationships')
                            ->schema([
                                Forms\Components\Select::make('categories')
                                    ->label('Categories')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique(),
                                        Forms\Components\TextInput::make('type')
                                            ->default('blog')
                                            ->required(),
                                    ]),

                                Forms\Components\Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique(),
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl(fn($record) => $record->getFirstMediaUrl('featured_image', 'thumb'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->words(7),

                Tables\Columns\TextColumn::make('categories.name')
                    ->badge()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Published')
                    ->boolean(),

                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),

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
                Tables\Filters\SelectFilter::make('status')
                    ->label('Published')
                    ->options([
                        '1' => 'Published',
                        '0' => 'Draft',
                    ]),

                Tables\Filters\SelectFilter::make('featured')
                    ->options([
                        '1' => 'Featured',
                        '0' => 'Not Featured',
                    ]),

                Tables\Filters\SelectFilter::make('categories')
                    ->label('Categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
            'view' => Pages\ViewBlog::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withCount(['categories', 'tags']);
    }
}
