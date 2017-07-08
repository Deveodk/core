<?php
namespace Infrastructure\Providers;

use Illuminate\Routing\Router;
use Optimus\Api\System\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }


    /**
     * Router
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    protected function router()
    {
        /** @var Router $router */
        $router = app(Router::class);
        return $router;
    }
}
