<?php namespace App\Http\Controllers\LastFm;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\StatsApp\Importers\TagsImporter;
use App\StatsApp\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class TagsController extends Controller
{

	protected $tagsImporter;

	/**
	 * @param TagsImporter $tagImporter
	 */
	function __construct(TagsImporter $tagImporter)
	{
		$this->tagsImporter = $tagImporter;

		$this->middleware('auth', ['only' => ['store', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Tags";
		// TODO: decode tags names. see: http://laravel-recipes.com/recipes/182/decoding-html-entities-to-a-string
		$tags = Tag::paginate(100);

		return view('tags.table', compact('tags', 'title'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Input::hasFile('tags'))
		{
			$tagsFileInfo = Input::file('tags');

			$tagsFile = File::get($tagsFileInfo->getRealPath());

			$this->tagsImporter->import($tagsFile);

			Flash::success('Successfully imported tags data into database.');

			return redirect()->route('tags_path');
		}

		Flash::error('File tags.dat is missing.');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Tag $tag
	 * @return Response
	 * @internal param int $id
	 */
	public function destroy(Tag $tag = null)
	{
		truncateByModel(new Tag);

		Flash::success('Successfully deleted all tags from database.');

		return redirect()->back();
	}

}
