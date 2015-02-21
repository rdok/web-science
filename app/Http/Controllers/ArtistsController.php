<?php namespace App\Http\Controllers;

use App\Artist;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ArtistsController extends Controller {

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
		//
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
