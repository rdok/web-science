<?php
use Illuminate\Support\Facades\Auth;

$I = new FunctionalTester($scenario);
$I->am('a StatsApp member');
$I->wantTo('login to my StatsApp');

$I->signIn();

$I->assertTrue(Auth::check(), "I am logged in to StatsApp");
$I->amOnRoute('show_dashboard');
$I->see('Welcome back!');
