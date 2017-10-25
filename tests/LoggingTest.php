<?php

use Orchestra\Testbench\TestCase;
use TheMakeryStudio\EloquentLogger\EloquentLoggerProvider;

class LoggingTest extends TestCase
{
	public function __construct()
	{

	}

    public function testItRuns()
    {    	
    	$this->assertTrue(true);
    }

    protected function getPackageProviders($app)
	{
    	return [EloquentLoggerProvider::class];
	}

	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
	    // Setup default database to use sqlite :memory:
	    $app['config']->set('database.default', 'testbench');
	    $app['config']->set('database.connections.testbench', [
	        'driver'   => 'sqlite',
	        'database' => ':memory:',
	        'prefix'   => '',
	    ]);
	}	
}
