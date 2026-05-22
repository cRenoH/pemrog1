<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    /**
     * Nilai rating.
     *
     * @var float
     */
    public $rating;

    /**
     * Jumlah bintang maksimum.
     *
     * @var int
     */
    public $maxStars;

    /**
     * Create a new component instance.
     *
     * @param float $rating
     * @param int $maxStars
     * @return void
     */
    public function __construct($rating = 0, $maxStars = 5)
    {
        $this->rating = (float) $rating;
        $this->maxStars = (int) $maxStars;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.star-rating');
    }
}