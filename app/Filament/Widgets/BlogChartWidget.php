<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BlogChartWidget extends ChartWidget
{
    public function getHeading(): ?string
    {
        return 'Blog Content Statistics';
    }

    public function getDescription(): ?string
    {
        return 'Monthly blog post publication activity';
    }

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 2;
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Blog::select(
                DB::raw('COUNT(*) as count'),
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month")
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $values = [];

        // Fill in any missing months
        $startDate = Carbon::now()->subMonths(6)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        for ($date = $startDate; $date->lte($endDate); $date->addMonth()) {
            $monthKey = $date->format('Y-m');
            $labels[] = $date->format('M Y');

            $monthData = $data->firstWhere('month', $monthKey);
            $values[] = $monthData ? $monthData->count : 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Blog Posts',
                    'data' => $values,
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.7)',
                    ],
                    'borderColor' => [
                        'rgb(54, 162, 235)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public function getFooter(): string
    {
        return 'Blog content module';
    }
}
