<?php namespace App\Http\Controllers\Api;

use App\Artist;
use App\Http\Requests;
use App\StatsApp\Transformers\ArtistTransformer;
use Illuminate\Support\Facades\DB;

class ArtistsController extends ApiController
{

	protected $artistTransformer;

	function __construct(ArtistTransformer $artistTransformer)
	{
		$this->artistTransformer = $artistTransformer;

		$this->middleware('auth.basic', ['only' => 'post']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param null $minimumTimesListened
	 * @return Response
	 */
	public function index($minimumTimesListened = null)
	{
		// TODO: use slugs instead of id. Requirement: give users, tag slugs.
		if ($minimumTimesListened !== null)
		{
			$listenedArtists = DB::table('last_fm_user_artist')
//				->join('last_fm_user_artist', 'artists.id', '=', 'last_fm_user_artist.artist_id')
				->where('listen_count', '>', 1)
				->orderBy('listen_count', 'asc')
				->get();

			return $this->respond([
				'data' => $listenedArtists
			]);
		}

		$artists = Artist::all();

		return $this->respond([
			'data' => $this->artistTransformer->transformCollection($artists->all())
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Input::get('slug'))
		{
			// some kind of response
			// 422
			// provide a message
			return $this->setStatusCode(422)->respondWithError('Parameters failed validation for an artist');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Artist $artist
	 * @return Response
	 * @internal param int $slug
	 */
	public function show(Artist $artist)
	{
		if (!$artist->slug)
		{
			return $this->respondNotFound('Artist not found');
		}

		return $this->respond([
			'data' => $this->artistTransformer->transform($artist)
		]);
	}

}
