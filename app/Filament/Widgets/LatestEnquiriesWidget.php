<?php

namespace App\Filament\Widgets;

use App\Models\Enquiry;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestEnquiriesWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 2;

    public function getHeading(): ?string
    {
        return 'Latest Customer Enquiries';
    }

    public function getSubheading(): ?string
    {
        return 'Customer communications module';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Enquiry::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('subject')
                    ->limit(30)
                    ->searchable(),
                IconColumn::make('is_read')
                    ->boolean()
                    ->label('Read')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Enquiry $record): string => route('filament.admin.resources.enquiries.view', ['record' => $record]))
                    ->icon('heroicon-m-eye'),
            ])
            ->emptyStateHeading('No enquiries yet')
            ->emptyStateDescription('When you receive contact form submissions, they will appear here.')
            ->emptyStateIcon('heroicon-o-inbox');
    }
}
