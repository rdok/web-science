<?php
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a StatsApp account');

$I->amOnRoute('show_dashboard');
$I->click('Sign Up');
$I->amOnRoute('register_index');

$I->fillField('username', 'test');
$I->fillField('name', 'Rizart Dokollari');
$I->fillField('email', 'test@gmail.com');
$I->fillField('password', 'secret');
$I->fillField('password_confirmation', 'secret');
$I->click('Register');

$I->amOnRoute('show_dashboard');
$I->see('Welcome to StatsApp!');

$I->seeRecord('users', [
	'username' => 'rdok'
]);

$I->assertTrue(Auth::check(), "I am logged in to StatsApp");