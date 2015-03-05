<?php namespace App\Http\Controllers;

use App\Artist;
use App\Http\Requests;
use App\LastFmUser;
use App\StatsApp\Importers\LastFmUserImporter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class LastFmUsersController extends Controller
{
	protected $lastFmUsersImporter;

	/**
	 * @param LastFmUserImporter $lastFmUserImporter
	 */
	function __construct(LastFmUserImporter $lastFmUserImporter)
	{
		$this->lastFmUsersImporter = $lastFmUserImporter;

		$this->middleware('auth', ['only' => ['store', 'destroy']]);
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// if artists table is empty genreate exception import artsit first
		if (Artist::all()->isEmpty())
		{
			Flash::error('Artist data is required. Import artist.dat first');

			return redirect()->back();
		}

		if (Input::hasFile('lastFmUserArtist'))
		{
			$lastFmUserArtistFileInfo = Input::file('lastFmUserArtist');

			$lastFmUserArtistsFile = File::get($lastFmUserArtistFileInfo->getRealPath());

			$this->lastFmUsersImporter->import($lastFmUserArtistsFile);

			Flash::success('Successfully imported artists data into database.');

			return redirect()->route('artists_path');
		}

		Flash::error('File user_artists.dat is missing.');

		return redirect()->route('last_fm_users_path');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "destroy lastfm users";
	}

}
