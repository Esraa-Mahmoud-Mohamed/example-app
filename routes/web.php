<?php

use App\Http\Controllers\CompanySettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EndUser\AboutUsController;
use App\Http\Controllers\EndUser\AccountController;
use App\Http\Controllers\EndUser\BlogController;
use App\Http\Controllers\EndUser\CartController;
use App\Http\Controllers\EndUser\CartItemController;
use App\Http\Controllers\EndUser\CheckoutController;
use App\Http\Controllers\EndUser\ContactMessageController;
use App\Http\Controllers\EndUser\ContactUsController;
use App\Http\Controllers\EndUser\CouponController;
use App\Http\Controllers\EndUser\NewsletterController;
use App\Http\Controllers\EndUser\ShopController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
})->name('enduser.home');

Route::get('shop', [ShopController::class, 'index'])->name('enduser.shop');
Route::get('service', [App\Http\Controllers\EndUser\ServiceController::class, 'index'])->name('enduser.service');
Route::get('about-us', [AboutUsController::class, 'index'])->name('enduser.about-us');
Route::get('blogs', [BlogController::class, 'index'])->name('enduser.blogs');
Route::get('contact-us', [ContactUsController::class, 'index'])->name('enduser.contact-us');

Route::get('cart', [CartController::class, 'index'])->name('enduser.cart');
Route::post('cart/items/{product}', [CartItemController::class, 'store'])
    ->name('enduser.cart.item.store');

Route::patch('/cart/items/{item}', [CartItemController::class, 'update'])
    ->name('enduser.cart.item.update');
Route::delete('/cart/items/{item}', [CartItemController::class, 'destroy'])
    ->name('enduser.cart.item.remove');
    
Route::post('/cart/coupon', [CouponController::class, 'store'])
    ->name('enduser.cart.coupon');
Route::delete('/cart/coupon', [CouponController::class, 'destroy'])
    ->name('enduser.cart.coupon.remove');

Route::post('newsletter', [NewsletterController::class, 'store'])
    ->name('enduser.newsletter.store');
Route::post('contact-message', [ContactMessageController::class, 'store'])
    ->name('enduser.contact-message.store');

Route::get('checkout', [CheckoutController::class, 'index'])->name('enduser.checkout');
Route::post('checkout', [CheckoutController::class, 'store'])->name('enduser.checkout.store');

Route::get('thank-you', function () {
    return view('enduser.thankyou');
})->name('enduser.thankyou');

Route::prefix('account')->middleware('auth')->group(function () {

    Route::get('/', [AccountController::class, 'index'])
        ->name('enduser.account');

    Route::get('/profile', [AccountController::class, 'profile'])
        ->name('enduser.account.profile');
    
    Route::get('/orders', [AccountController::class, 'orders'])
        ->name('enduser.account.orders');

    
});

Route::prefix(LaravelLocalization::setLocale())->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            // Route::get('/users', [UserController::class, 'index']);

            
            Route::get('company-settings', [CompanySettingController::class, 'show'])
                ->name('company-settings.show');
            Route::get('company-settings/edit', [CompanySettingController::class, 'edit'])
                ->name('company-settings.edit');
            Route::put('company-settings', [CompanySettingController::class, 'update'])
                ->name('company-settings.update');
            Route::put('company-settings/reset', [CompanySettingController::class, 'reset'])
                ->name('company-settings.reset');

            Route::resource('/users', UserController::class);
            Route::resource('/posts', PostController::class);
            Route::resource('/roles', RoleController::class);
            Route::resource('/testimonials', TestimonialController::class);
            Route::resource('/services', ServiceController::class);
            Route::resource('/products', ProductController::class);
            Route::resource('/team-members', TeamMemberController::class);
        });
    });
});



require __DIR__ . '/auth.php';
