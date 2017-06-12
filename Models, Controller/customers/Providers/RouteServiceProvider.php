<?php namespace Customers\Providers;

use Illuminate\Routing\Router;
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
    protected $namespace = 'Customers\Http\Controllers';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }


    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapCustomerRoutes($router);
        $this->mapAuthRoutes($router);
    }


    /**
     * Define the 'auth.customer' routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    protected function mapCustomerRoutes(Router $router)
    {
        $router->group([
            'namespace'  => $this->namespace,
            'middleware' => 'auth.customer',
        ], function ($router) {
            require customer_path('Http/routes.php');
        });
    }


    /**
     * Define the 'auth.customer' routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    protected function mapAuthRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
        ], function ($router) {
            require customer_path('Http/auth_routes.php');
        });
    }
}
