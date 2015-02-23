<?php
$I = new FunctionalTester($scenario);
$I->wantTo('sign out of StatsApp');

$I->haveAnAccount();
$I->signIn();
$I->amOnRoute('show_dashboard');
$I->click('Sign out');
$I->amOnRoute('show_dashboard');
$I->see('You have been logged out!');

//
