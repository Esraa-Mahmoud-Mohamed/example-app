<?php

namespace App\View\Components\EndUser;

use App\Models\Testimonial;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestimonialComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $testimonials;

    public function __construct()
    {
        $this->testimonials = Testimonial::with('user')->limit(3)->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.end-user.testimonial-component');
    }
}
