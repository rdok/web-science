<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\StatsApp\Tag;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class TagsController extends Controller {

	function __construct()
	{
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
		$tags = Tag::all();

		return view('tags.table', compact('tags', 'title'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return 'store tags';
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
		DB::statement("TRUNCATE TABLE tags CASCADE"); // postgresql

		Flash::success('Successfully deleted all tags from database.');

		return redirect()->back();
	}

}
