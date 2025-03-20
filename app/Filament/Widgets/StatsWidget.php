<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    public function getHeading(): ?string
    {
        return 'Website Overview';
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Enquiries', Enquiry::count())
                ->description('Total contact form submissions')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Unread Enquiries', Enquiry::where('is_read', false)->count())
                ->description('Awaiting response')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->color('warning'),

            Stat::make('Services', Service::count())
                ->description('Published services')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('success'),

            Stat::make('Blogs', Blog::count())
                ->description('Published articles')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),

            Stat::make('Products', Product::count())
                ->description('Available products')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),

            Stat::make('Users', User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-m-user')
                ->color('gray'),
        ];
    }
}
