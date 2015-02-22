<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\SessionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SessionController extends Controller {

	function __construct()
	{
//		$this->middleware('guest', ['except' => 'destroy']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Login";

		return view('auth.login', compact('title'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param SessionRequest $request
	 * @return Response
	 */
	public function create()
	{
		if (Auth::attempt(Input::only('username', 'password')))
		{
			return redirect()->route('show_dashboard');
		}
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
			return redirect()->route('show_dashboard');
		}

		return redirect()->back()->withInput()->with('error', 'Invalid email/password');
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

		return redirect()->route('show_dashboard');
	}

}
