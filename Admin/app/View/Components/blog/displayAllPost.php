<?php

namespace App\View\Components\blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class displayAllPost extends Component
{
    /**
     * Create a new component instance.
     */
    public $getAllPosts;
    public function __construct($getAllPosts)
    {
        //
        $this->getAllPosts=$getAllPosts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.display-all-post');
    }
}
