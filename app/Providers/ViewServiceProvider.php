<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.admin.sidebar', function ($view) {
            $view->with('usersCount', User::count());
            $view->with('postsCount', Post::count());
            $view->with('rolesCount', Role::count());
            $view->with('testimonialsCount', Testimonial::count());
            $view->with('servicesCount', Service::count());
            $view->with('productsCount', Product::count());
            $view->with('teamMembersCount', TeamMember::count());
        });

        View::composer('components.end-user.navbar', function ($view) {
            $cart = app(CartService::class)->cart();

            $view->with(
                'productsCount',
                $cart ? $cart->items()->sum('quantity') : 0
            );  
        });
    }
}
