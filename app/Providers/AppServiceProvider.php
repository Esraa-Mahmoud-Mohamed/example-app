<?php

namespace App\Providers;

use App\Models\CompanySetting;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        $companySetting = CompanySetting::first();
        view()->share('companySetting', $companySetting);
    }
}
