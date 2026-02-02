<?php

namespace App\Filament\Resources\Posts\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostStatWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPosts = Post::count();

        return [
            Stat::make('Total Posts', $totalPosts)
                ->description('Number of all posts')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->icon('heroicon-o-document-text')
                ->color('success'),
        ];
    }
}
