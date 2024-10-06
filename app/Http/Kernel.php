<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'cors' => \App\Http\Middleware\Cors::class,
        'manage-ads' => \App\Http\Middleware\Permissions\ManageAds::class,
        'manage-city' => \App\Http\Middleware\Permissions\ManageCity::class,
        'manage-merchant' => \App\Http\Middleware\Permissions\ManageMerchant::class,
        'manage-notification' => \App\Http\Middleware\Permissions\ManageNotifications::class,
        'manage-product' => \App\Http\Middleware\Permissions\ManageProduct::class,
        'manage-store' => \App\Http\Middleware\Permissions\ManageStore::class,
        'get-evaluations' => \App\Http\Middleware\Permissions\GetEvaluations::class,
        'get-merchants' => \App\Http\Middleware\Permissions\GetMerchants::class,
        'get-product-requests' => \App\Http\Middleware\Permissions\GetProductsRequests::class,
        'get-users' => \App\Http\Middleware\Permissions\GetUsers::class,
        'store-promo-management' => \App\Http\Middleware\Permissions\StorePromoManagement::class,
        'get-admins' => \App\Http\Middleware\Permissions\GetAdmins::class,
        'admin-statistics' => \App\Http\Middleware\Permissions\AdminStatistics::class,
        'merchant-statistics' => \App\Http\Middleware\Permissions\MerchantStatistics::class,
        'manage-admin' => \App\Http\Middleware\Permissions\ManageAdmin::class,
    ];
}
