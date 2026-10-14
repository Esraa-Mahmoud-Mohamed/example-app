<?php

namespace App\View\Components\EndUser;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceComponent extends Component
{
    public $services;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->services = Service::with('images')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.end-user.service-component');
    }
}
