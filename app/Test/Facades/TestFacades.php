<?php

namespace app\Test\Facades;

use Illuminate\Support\Facades\Facade;

class TestFacades extends Facade {
   protected static function getFacadeAccessor() { return 'test'; }
   
   public function testingFacades() {
         echo "Testing the Facades in Laravel.";
      }
}