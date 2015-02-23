<?php
$I = new FunctionalTester($scenario);
$I->wantTo('to fail to sign');

// have an account
$I->haveAnAccount();
// try to login
//$I->();

// see error message 'Invalid email/password.'
