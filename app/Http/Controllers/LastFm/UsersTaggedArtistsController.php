<?php namespace App\Http\Controllers\LastFm;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\LastFmUser;
use App\StatsApp\Importers\LastFmUserImporter;
use App\StatsApp\Importers\LastFmUserTaggedArtistsImporter;
use App\StatsApp\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class UsersTaggedArtistsController extends Controller
{
	protected $lastFmUserTagArtistsImporter;
	protected $lastFmUserImporter;

	/**
	 * @param LastFmUserImporter $lastFmUserImporter
	 * @param LastFmUserTaggedArtistsImporter $userTagArtistsImporter
	 */
	function __construct(LastFmUserImporter $lastFmUserImporter, LastFmUserTaggedArtistsImporter $userTagArtistsImporter)
	{
		$this->lastFmUserTagArtistsImporter = $userTagArtistsImporter;
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

		$usersTagArtists = DB::table('last_fm_user_tag_artist')->take(3)->get();

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

		if (!Input::hasFile('usersTagArtists'))
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

		$this->lastFmUserTagArtistsImporter->import($lastFmUserTaggedArtistsFile);

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
