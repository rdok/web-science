<?php namespace App\Http\Controllers;

use App\Artist;
use App\StatsApp\Transformers\ArtistTransformer;
use Illuminate\Support\Facades\Response;

/**
 * Class ArtistsController
 * @package App\Http\Controllers
 */
class ArtistsController extends ApiController {

	/**
	 * @var ArtistTransformer;
	 */
	protected $artistTransformer;

	/**
	 * @param ArtistTransformer $artistTransformer
	 */
	function __construct(ArtistTransformer $artistTransformer)
	{
		$this->artistTransformer = $artistTransformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//		$title = "Artists";
//		$secondTitle = "table";
//		return view('artists.list', compact('title', 'secondTitle', 'artists'));

		$artists = Artist::all();

		return $this->respond([
			'data' => $this->artistTransformer->transformCollection($artists->all())
		]);
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

			$rawArtists = explode("\n", $artistsFile); // to array

			$totalArtists = count($rawArtists) - 1; // -1 due to \n at last line

			$artists = [];

			// TODO: for each line create new artists if new artists slag does not exist
			for ($i = 1; $i < $totalArtists; $i++) // first line contains labels; omit them
			{
				list($id, $name, $url, $pictureUrl) = explode("\t", $rawArtists[$i]);

				$slug = str_replace('http://www.last.fm/music/', '', $url);

				$now = Carbon::now();

				$artists[] = [
					'name'       => $name,
					'slug'       => $slug,
					'url'        => $url,
					'created_at' => $now,
					'updated_at' => $now
				];
			}

			$artistChunk = array_chunk($artists, 200);

			foreach ($artistChunk as $chunk)
			{
				DB::table('artists')->insert($chunk);
			}


			return "redirect to artist with success message";
		}

		// show error message
		return "show errror message";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		$artist = Artist::find($id);

		if (!$artist)
		{
			return $this->respondNotFound('Artist not found');
		}

		return $this->respond([
			'data' => $this->artistTransformer->transform($artist)
		]);
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
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
