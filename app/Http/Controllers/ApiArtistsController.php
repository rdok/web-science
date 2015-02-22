<?php namespace App\Http\Controllers;

use App\Artist;
use App\Http\Requests;
use App\StatsApp\Transformers\ArtistTransformer;

class ApiArtistsController extends ApiController {

	protected $artistTransformer;

	function __construct(ArtistTransformer $artistTransformer)
	{
		$this->artistTransformer = $artistTransformer;

		$this->middleware('auth.basic', ['only' => 'post']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$artists = Artist::paginate(100);

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
