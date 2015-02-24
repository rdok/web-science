<?php namespace App\Http\Controllers\Api;

use App\Artist;
use App\Http\Requests;
use App\StatsApp\Transformers\TagTransformer;
use App\Tag;

class TagsController extends ApiController {

	protected $tagTransformer;

	/**
	 * @param TagTransformer $tagTransformer
	 */
	function __construct(TagTransformer $tagTransformer)
	{
		$this->tagTransformer = $tagTransformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Artist $artist
	 * @return Response
	 */
	public function index(Artist $artist = null)
	{
		if ($artist->slug === null) return $this->respondNotFound();

		$tags = $this->getTags($artist);

		return $this->respond([
			'data' => $this->tagTransformer->transformCollection($tags->all())
		]);
	}

	/**
	 * @param Artist $artist
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany|static[]
	 */
	public function getTags(Artist $artist)
	{

		$tags = $artist ? $artist->tags : Tag::all();

		return $tags;
	}
}
