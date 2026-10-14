<?php

namespace App\Providers;

use App\Policies\CompanySettingPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ServicePolicy;
use App\Policies\TeamMemberPolicy;
use App\Policies\TestimonialPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class GateServiceProvider extends ServiceProvider
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
        Gate::define('view-post', [PostPolicy::class, 'view']);
        Gate::define('create-post', [PostPolicy::class, 'create']);
        Gate::define('edit-post', [PostPolicy::class, 'update']);
        Gate::define('delete-post', [PostPolicy::class, 'delete']);

        Gate::define('view-user', [UserPolicy::class, 'view']);
        Gate::define('create-user', [UserPolicy::class, 'create']);
        Gate::define('edit-user', [UserPolicy::class, 'update']);
        Gate::define('delete-user', [UserPolicy::class, 'delete']);

        Gate::define('view-testimonial', [TestimonialPolicy::class, 'view']);
        Gate::define('create-testimonial', [TestimonialPolicy::class, 'create']);
        Gate::define('edit-testimonial', [TestimonialPolicy::class, 'update']);
        Gate::define('delete-testimonial', [TestimonialPolicy::class, 'delete']);

        Gate::define('view-service', [ServicePolicy::class, 'view']);
        Gate::define('create-service', [ServicePolicy::class, 'create']);
        Gate::define('edit-service', [ServicePolicy::class, 'update']);
        Gate::define('delete-service', [ServicePolicy::class, 'delete']);

        Gate::define('view-product', [ProductPolicy::class, 'view']);
        Gate::define('create-product', [ProductPolicy::class, 'create']);
        Gate::define('edit-product', [ProductPolicy::class, 'update']);
        Gate::define('delete-product', [ProductPolicy::class, 'delete']);

        Gate::define('view-team-member', [TeamMemberPolicy::class, 'view']);
        Gate::define('create-team-member', [TeamMemberPolicy::class, 'create']);
        Gate::define('edit-team-member', [TeamMemberPolicy::class, 'update']);
        Gate::define('delete-team-member', [TeamMemberPolicy::class, 'delete']);

        Gate::define('view-company-setting', [CompanySettingPolicy::class, 'view']);
        Gate::define('edit-company-setting', [CompanySettingPolicy::class, 'update']);
        Gate::define('reset-company-setting', [CompanySettingPolicy::class, 'reset']);
    }
}
