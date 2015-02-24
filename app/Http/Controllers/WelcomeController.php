<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller {


	/**
	 * Show the application welcome screen to the user.
	 * @return Response
	 */
	public function index()
	{
		$title = "Dashboard";

		Session::reflash();

		return view('dashboard', compact('title'));
	}

}
