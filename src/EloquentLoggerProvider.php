<?php

namespace Makery\EloquentLogger\Providers;

use Log;
use Makery\EloquentLogger\Log as LogModel;
use Makery\EloquentLogger\EloquentLogHandler;
use Illuminate\Support\ServiceProvider;

class EloquentLoggerProvider extends ServiceProvider
{
    private $logger;

    /**
     * Get underlying monorlog instance.
     * @return type
     */
    public function __construct()
    {
        $this->logger = Log::getMonolog();
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');        
    }

    /**
     * Register the application services.
     * Remove the default stream file logger.
     *
     * @return void
     */
    public function register()
    {
        $this->logger->popHandler();
        $this->logger->pushHandler(new EloquentLogHandler(
            new LogModel
        ));
    }
}
