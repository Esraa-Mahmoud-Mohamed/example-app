<?php

namespace App\View\Components\EndUser;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $blogs;
    public function __construct($limit = null)
    {
        $query =  Post::with(['user','images','categories']);
        if ($limit) {
            $query->limit($limit);
        }
        else{
            $query->limit(9);
        }

        $this->blogs = $query->latest()->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.end-user.blog-component');
    }
}
