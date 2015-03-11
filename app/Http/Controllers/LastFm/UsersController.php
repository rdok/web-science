<?php namespace App\Http\Controllers\LastFm;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\LastFmUser;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{

	function __construct()
	{
		$this->middleware('auth', ['only' => ['destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "LastFm Users";
		$lastFmUsers = LastFmUser::paginate(100);

		return view('last_fm_users.default', compact('title', 'secondTitle', 'lastFmUsers'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		truncateByModel(new LastFmUser);

		Flash::success('Successfully deleted all LastFm Users from database.');

		return redirect()->back();
	}

}
