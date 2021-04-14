<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('test',function() {
         return new \App\Test\TestFacades;
      });
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
	
	public function testingFacades() {
		echo "Testing the Facades in Laravel.";
	}	
}
