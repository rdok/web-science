<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\LastFmUser;
use Laracasts\Flash\Flash;

class LastFmUsersController extends Controller
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

		return view('last_fm_users.table', compact('title', 'secondTitle', 'lastFmUsers'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		truncateByModel(new LastFmUser);

		Flash::success('Successfully deleted all lastfm users from database.');

		return redirect()->back();
	}

}
