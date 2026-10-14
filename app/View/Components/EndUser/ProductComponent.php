<?php

namespace App\View\Components\EndUser;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductComponent extends Component
{
    public $products;
    /**
     * Create a new component instance.
     */
    public function __construct($limit = null)
    {
        $query = Product::with('images');
        if ($limit) {
            $query->where('is_featured', true)->limit($limit);
        } else {
            $query->limit(8);
        }
        $this->products = $query->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.end-user.product-component');
    }
}
