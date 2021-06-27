<?php

namespace App\View\Components;

use App\Category;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $categories;
    public function __construct($categories)
    {
        $this->categories = Category::paginate(6);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
