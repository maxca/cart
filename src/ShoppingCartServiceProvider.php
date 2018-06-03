<?php
namespace Samark;

use Illuminate\Support\ServiceProvider;

class ShippingCartServiceProvider extends ServiceProvider
{

    /**
     * register servicde
     * @return [type] [description]
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config/cart.php' => config_path('cart.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/cart.php', 'cart'
        );
    }

    /**
     * booting application
     * @return [type] [description]
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['samark.cart'];
    }

}
