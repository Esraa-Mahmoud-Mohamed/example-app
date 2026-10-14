<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardServiceProvider extends ServiceProvider
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
        // View::share('usersCount', User::count());
        // View::share('postsCount', Post::count());
        // View::share('rolesCount', Role::count());

        View::composer('dashboard', function ($view) {

            $view->with([
                'usersCount' => User::count(),
                'postsCount' => Post::count(),
                'rolesCount' => Role::count(),
                'latestUsers' => User::latest()->take(5)->get(),
                'latestPosts' => Post::latest()->take(5)->get(),
                'adminsCount' => User::role('admin')->count(),
                'moderatorsCount' => User::role('moderator')->count(),
                'newUsersThisMonth' => User::whereMonth('created_at', now()->month)->count(),
                'postsToday' => Post::whereDate('created_at', today())->count(),
                'postsThisMonth' => Post::whereMonth('created_at', now()->month)->count(),
                'categoriesCount' => Category::count(),
                'mostPopularCategory' => Category::withCount('posts')->orderByDesc('posts_count')->first(),
                'permissionsCount' => Permission::count(),
            ]);
        });
    }
}
