<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a StatsApp account');

$I->amOnRoute('/');
$I->click('Sign Up');
//$I->seeCurrentUrlEquals()
