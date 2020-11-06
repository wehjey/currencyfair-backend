<?php


namespace App\Providers;

use App\Http\Repositories\interfaces\TradeMessageInterface;
use App\Http\Repositories\TradeMessageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TradeMessageInterface::class, TradeMessageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
