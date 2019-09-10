<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null) {
    	return $this->actingAs($user ? : factory('App\User')->create());
    }

    protected function factoryWithoutObservers($class, $name = 'default') {
        $class::flushEventListeners();
        return factory($class, $name);
    }

    
}
