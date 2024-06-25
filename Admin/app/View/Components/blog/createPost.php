<?php

namespace App\View\Components\blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class createPost extends Component
{
    /**
     * Create a new component instance.
     */
    public $getAllCategories;
    public $getAllTags;
    public $getAllUsers;
    public function __construct($getAllCategories, $getAllTags, $getAllUsers)
    {
        //
        $this->getAllCategories = $getAllCategories;
        $this->getAllTags = $getAllTags;
        $this->getAllUsers = $getAllUsers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.create-post');
    }
}
