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

		return view('artists.list', compact('title', 'secondTitle', 'artists'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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

			return redirect()->back();
		}

		Flash::error('Something went wrong with importing data.');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
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
	 * @return Response
	 */
	public function destroy()
	{
		Artist::truncate();

		Flash::success('Successfully deleted all artists database.');

		return redirect()->route('artists_path');
	}


}
