<?php namespace App\Http\Controllers;

use App\Artist;
use App\Http\Requests;
use App\LastFmUser;
use App\StatsApp\Importers\LastFmUserArtistsImporter;
use App\StatsApp\Importers\LastFmUserImporter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class LastFmUsersArtistsController extends Controller
{
	protected $lastFmUserArtistsImporter;
	protected $lastFmUserImporter;

	/**
	 * @param LastFmUserArtistsImporter $lastFmUserArtistsImporter
	 * @param LastFmUserImporter $lastFmUserImporter
	 */
	function __construct(LastFmUserImporter $lastFmUserImporter, LastFmUserArtistsImporter $lastFmUserArtistsImporter)
	{
		$this->lastFmUserArtistsImporter = $lastFmUserArtistsImporter;
		$this->lastFmUserImporter = $lastFmUserImporter;

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
		$lastFmUsers = LastFmUser::paginate(10);

		return view('last_fm_users.artists_table', compact('title', 'secondTitle', 'lastFmUsers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Artist::all()->isEmpty())
		{
			Flash::error('Artist data is required. Import artist.dat first');

			return redirect()->route('artists_path');
		}

		if (!Input::hasFile('lastFmUserArtist'))
		{
			Flash::error('File user_artists.dat is missing.');

			return redirect()->route('last_fm_users_path');
		}

		$lastFmUserArtistFileInfo = Input::file('lastFmUserArtist');

		$lastFmUserArtistsFile = File::get($lastFmUserArtistFileInfo->getRealPath());

		if (LastFmUser::all()->isEmpty())
		{
			$this->lastFmUserImporter->import($lastFmUserArtistsFile);
		}


		$this->lastFmUserArtistsImporter->import($lastFmUserArtistsFile);

		Flash::success('Successfully imported user artists data into database.');

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
		truncateByModel(new LastFmUser);

		Flash::success('Successfully deleted all lastfm users from database.');

		return redirect()->back();
	}

}
