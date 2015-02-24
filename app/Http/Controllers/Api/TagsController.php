<?php namespace App\Http\Controllers\Api;

use App\Artist;
use App\Http\Requests;
use App\StatsApp\Tag;
use App\StatsApp\Transformers\TagTransformer;

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
	 * @internal param Tag $tag
	 */
	public function index(Artist $artist = null)
	{
		if ($artist->id === null && $artist === null)
		{
			$tags = Tag::paginate(100);
		} else if ($artist->slug === null)
		{
			return $this->respondNotFound();
		} else
		{
			$tags = $this->getTags($artist);
		}


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
