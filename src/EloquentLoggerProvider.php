<?php

namespace TheMakeryStudio\EloquentLogger;

use Illuminate\Support\ServiceProvider;
use TheMakeryStudio\EloquentLogger\LogModel;
use TheMakeryStudio\EloquentLogger\EloquentLoggerRepository;

class EloquentLoggerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {                        
        $logger = app()->make('log')->getMonolog();        
        $logger->popHandler();
        $logger->pushHandler(new EloquentLoggerRepository(
            new LogModel
        ));
    }

    /**
     * Register the application services.
     * Remove the default stream file logger.
     *
     * @return void
     */
    public function register()
    {   
        $this->loadMigrationsFrom(__DIR__.'/../migrations/');
    }
}
