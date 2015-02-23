<?php namespace App\Http\Controllers\Auth;

use App\Commands\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\StatsApp\Forms\RegistrationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

/**
 * Class RegistrationController
 * @package App\Http\Controllers\Auth
 */
class RegistrationController extends Controller {
	/**
	 * @var Command
	 */
	private $command;

	/**
	 * @internal param Command $command
	 */
	function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Register";

		return view('auth.register', compact('title'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param RegistrationRequest $request
	 * @return Response
	 */
	public function store(RegistrationRequest $request)
	{
		extract(Input::only('username', 'name', 'email', 'password'));

		$user = $this->dispatch(
			new RegisterUser($username, $name, $email, $password)
		);

		Auth::login($user);

		Flash::message('Registration successful');

		return redirect()->route('show_dashboard'); // redirect back unless login page
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
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
