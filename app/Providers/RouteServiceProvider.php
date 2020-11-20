<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'admin'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            // todo Add admin_api routes here

            Route::middleware(['web', 'registrar'])
                ->prefix('registrar')
                ->name('registrar.')
                ->group(base_path('routes/registrar.php'));

            // todo Add registrar_api routes here

            Route::middleware(['web', 'enrollmentOfficer'])
                ->prefix('enrollment-officer')
                ->name('enrollment_officer.')
                ->group(base_path('routes/enrollment_officer.php'));

            // todo Add enrollment_officer_api routes here

            Route::middleware(['web', 'principal'])
                ->prefix('principal')
                ->name('principal.')
                ->group(base_path('routes/principal.php'));

            // todo Add principal_api routes here

            Route::middleware(['web', 'teacher'])
                ->prefix('teacher')
                ->name('teacher.')
                ->group(base_path('routes/teacher.php'));

            // todo Add teacher_api routes here
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
