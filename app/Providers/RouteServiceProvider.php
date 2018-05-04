<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapStudentRoutes();

        $this->mapTutorRoutes();

        $this->mapSuperadminRoutes();

        //
    }

    /**
     * Define the "superadmin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSuperadminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'superadmin', 'auth:superadmin'],
            'prefix' => 'superadmin',
            'as' => 'superadmin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/superadmin.php');
        });
    }

    /**
     * Define the "tutor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapTutorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'tutor', 'auth:tutor'],
            'prefix' => 'tutor',
            'as' => 'tutor.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/tutor.php');
        });
    }

    /**
     * Define the "student" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapStudentRoutes()
    {
        Route::group([
            'middleware' => ['web', 'student', 'auth:student'],
            'prefix' => 'student',
            'as' => 'student.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/student.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}