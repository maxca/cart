<?php
namespace Samark\Cart;

use Illuminate\Support\ServiceProvider;
use Samark\Cart\Command\CopyMigrationCommand;

class ShippingCartServiceProvider extends ServiceProvider
{
    /**
     * set command list
     * @var array
     */
    protected $commands = [
        CopyMigrationCommand::class,
    ];

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
        # $this->loadMigrationsFrom(__DIR__ . '/../database');

        # add command
        $this->commands($this->commands);
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
