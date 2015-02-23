<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\SessionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class SessionController extends Controller {

	function __construct()
	{
//		$this->middleware('guest', ['except' => 'destroy']);
	}

	/**
	 * Display a form for signing in.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Login";

		Session::reflash();

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
			Flash::success('Welcome back!');

			$defaultUrl = route('show_dashboard');

			return redirect()->intended($defaultUrl);
		}

		Flash::error('Invalid email/password');

		return redirect()->back()->withInput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

		return redirect()->route('show_dashboard');
	}

}
