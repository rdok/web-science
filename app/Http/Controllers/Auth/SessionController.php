<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\SessionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class SessionController extends Controller {

	function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

	/**
	 * Display a form for signing in.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Login";

		return view('auth.login', compact('title'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SessionRequest $sessionRequest
	 * @return Response
	 */
	public function store(SessionRequest $sessionRequest)
	{
		if (Auth::attempt(Input::only('email', 'password')))
		{
			Flash::success('Welcome back');

			return redirect()->intended(route('show_dashboard'))->withInput();
		}

		Flash::error('Invalid email/password');

		return redirect()->back()->withInput();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		Flash::success('You have been logged out!');

		return redirect()->back();
	}

}
