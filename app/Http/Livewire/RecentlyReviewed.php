<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $current = Carbon::now()->timestamp;
        $before = Carbon::now()->subMonths(2)->timestamp;

        $this->recentlyReviewed = Cache::remember('recently-reviewed', 7, function () use ($before, $current) {
            return Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count, summary;
                where platforms = (48,49,130,6)
                & (first_release_date >= {$before}
                & first_release_date < {$current})
                & rating_count > 5
                & total_rating_count > 5;
                sort total_rating_count desc;
                limit 3;", 'text/plain'
            )->post('https://api.igdb.com/v4/games')
            ->json();
        });
    }
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}