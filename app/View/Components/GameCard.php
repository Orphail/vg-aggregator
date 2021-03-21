<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameCard extends Component
{
    /**
     * @var array|object
     */
    public $game;

    /**
     * Create a new component instance.
     *
     * @param array|object $game
     */
    public function __construct($game)
    {

        $this->game = $game;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-card');
    }
}
