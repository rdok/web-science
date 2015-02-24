<?php namespace App\Http\Controllers;

use App\Artist;
use App\StatsApp\Importers\ArtistImporter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;


/**
 * Class ArtistsController
 * @package App\Http\Controllers
 */
class ArtistsController extends Controller {

	protected $artistImporter;

	/**
	 * @param ArtistImporter $artistImporter
	 */
	function __construct(ArtistImporter $artistImporter)
	{
		$this->artistImporter = $artistImporter;

		$this->middleware('auth', ['only' => ['store', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Artists";
		$artists = Artist::paginate(100);

		return view('artists.table', compact('title', 'secondTitle', 'artists'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Input::hasFile('artists'))
		{

			$artistsFileInfo = Input::file('artists');

			$artistsFile = File::get($artistsFileInfo->getRealPath());

			$this->artistImporter->import($artistsFile);

			Flash::success('Successfully imported artists data into database.');

			return redirect()->route('artists_path');
		}

		Flash::error('File artists.dat is missing.');

		return redirect()->route('artists_path');
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy()
	{
		truncate(new Artist);

		Flash::success('Successfully deleted all artists database.');

		return redirect()->back();
	}
}
