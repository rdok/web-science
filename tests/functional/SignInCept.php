<?php
$I = new FunctionalTester($scenario);
$I->am('a StatsApp member');
$I->wantTo('login to my StatsApp');

$I->signIn();

$I->amOnRoute('show_dashboard');
$I->see('Welcome back!');
