<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module {

	public function signIn()
	{
		$username = 'username';
		$name = 'name';
		$email = 'foo@example.com';
		$password = 'foo';

		$this->haveAnAccount(compact('email', 'password', 'username', 'name'));

		$I = $this->getModule('Laravel5');

		$I->amOnRoute('session_index');
		$I->fillField('email', $email);
		$I->fillField('password', $password);
		$I->click('Sign In');
	}

	public function haveAnAccount($overrides = [])
	{
		TestDummy::create('App\StatsApp\Users\User', $overrides);
	}
}
