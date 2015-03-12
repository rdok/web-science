<?php namespace App\Http\Controllers\LastFm;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\LastFmUser;
use App\StatsApp\Importers\LastFmUserFriendsImporter;
use App\StatsApp\Importers\LastFmUserImporter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class UsersFriendsController extends Controller
{
	protected $lastFmUserFriendsImporter;
	protected $lastFmUserImporter;

	/**
	 * @param LastFmUserImporter $lastFmUserImporter
	 * @param LastFmUserFriendsImporter $lastFmUserFriendsImporter
	 */
	function __construct(LastFmUserImporter $lastFmUserImporter, LastFmUserFriendsImporter $lastFmUserFriendsImporter)
	{
		$this->lastFmUserImporter = $lastFmUserImporter;
		$this->lastFmUserFriendsImporter = $lastFmUserFriendsImporter;

		$this->middleware('auth', ['only' => ['store', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "LastFm Users Friends";

		$lastFmUsers = DB::table('last_fm_user_friend')->take(50)->get();

		return view('last_fm_users.friends', compact('title', 'secondTitle', 'lastFmUsers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ( ! Input::hasFile('lastFmUserFriend'))
		{
			Flash::error('File user_friends.dat is missing.');

			return redirect()->route('last_fm_users_friends_path');
		}

		$lastFmUserFriendFileInfo = Input::file('lastFmUserFriend');

		$lastFmUserArtistsFile = File::get($lastFmUserFriendFileInfo->getRealPath());

		if (LastFmUser::all()->isEmpty())
		{
			$this->lastFmUserImporter->import($lastFmUserArtistsFile);
		}

		$this->lastFmUserFriendsImporter->import($lastFmUserArtistsFile);

		Flash::success('Successfully imported user friends data into database.');

		return redirect()->route('last_fm_users_friends_path');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		truncateByModel(new LastFmUser);

		Flash::success('Successfully deleted all LastFm users friends from database.');

		return redirect()->back();
	}

}
