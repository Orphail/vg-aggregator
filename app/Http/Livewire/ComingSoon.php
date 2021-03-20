<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;
        $this->comingSoon = Cache::remember('most-anticipated', 7, function () use ($current) {
            return Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count;
                where platforms = (48,49,130,6)
                & (first_release_date >= {$current})
                & hypes > 5;
                sort first_release_date asc;
                limit 4;", 'text/plain'
            )->post('https://api.igdb.com/v4/games')
            ->json();
        });
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
