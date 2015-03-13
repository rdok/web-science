<?php namespace App\Http\Controllers\LastFm;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\LastFmUser;
use App\StatsApp\Importers\LastFmUserArtistsImporter;
use App\StatsApp\Importers\LastFmUserImporter;
use App\StatsApp\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Laracasts\Flash\Flash;

class UsersTaggedArtistsController extends Controller
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
		$title = "LastFm Users Tagged Artists";

		$usersTagArtists = DB::table('last_fm_user_tag_artist')->take(20)->get();

		return view('last_fm_users.tagged_artists', compact('title', 'secondTitle', 'usersTagArtists'));
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

		if (Tag::all()->isEmpty())
		{
			Flash::error('Tag data is required. Import tag.dat first');

			return redirect()->route('tags_path');
		}

		dd(Request::file('usersTagArtists')->getErrorMessage());

		dd(Request::all());
		dd(Request::hasFile('usersTagArtists') );

//&&  Request::file('usersTagArtists')->isValid()

		if ( ! Input::hasFile('usersTagArtists'))
		{
			Flash::error('File user_taggedartists-timestamps.dat is missing.');

			return redirect()->back();
		}

		$lastFmUserTaggedArtistFileInfo = Input::file('usersTagArtists');

		$lastFmUserTaggedArtistsFile = File::get($lastFmUserTaggedArtistFileInfo->getRealPath());

		if (LastFmUser::all()->isEmpty())
		{
			$this->lastFmUserImporter->import($lastFmUserTaggedArtistsFile);
		}

		$this->lastFmUserArtistsImporter->import($lastFmUserTaggedArtistsFile);

		Flash::success('Successfully imported user tagged artists data into database.');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		truncateByTable('last_fm_user_tag_artist');

		Flash::success('Successfully deleted all LastFm Users tagged Artists from database.');

		return redirect()->back();
	}

}
