<?php namespace App\Http\Controllers;

use App\Artist;
use App\StatsApp\Importers\ArtistImporter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;


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
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Artists";
		$secondTitle = "table";
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
		// validate laravel checks csrf by defauled
		if (Input::hasFile('artists'))
		{
			$artistsFileInfo = Input::file('artists');

			$artistsFile = File::get($artistsFileInfo->getRealPath());

			$this->artistImporter->import($artistsFile);

			return redirect()->back();
		}

		// show error message
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
	 * @internal param int $id
	 */
	public function destroy()
	{
		Artist::truncate();

		return redirect()->back();
	}


}
