<?php

namespace Makery\EloquentLogger;

use Log;
use Makery\EloquentLogger\LogScheduler;
use Makery\EloquentLogger\LogModel;
use Makery\EloquentLogger\EloquentLoggerRepository;
use Illuminate\Support\ServiceProvider;

class EloquentLoggerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/../config/app.php') => config_path('app.php'),
        ], 'config');
        $logger = Log::getMonolog();
        $logger->popHandler();
        $logger->pushHandler(new EloquentLoggerRepository(
            new LogModel
        ));

        LogScheduler::start($schedule);
    }

    /**
     * Register the application services.
     * Remove the default stream file logger.
     *
     * @return void
     */
    public function register()
    {   
        $this->mergeConfigFrom(realpath(__DIR__.'/../config/app.php'), 'app');
        $this->loadMigrationsFrom(__DIR__.'/../migrations/');
    }
}
