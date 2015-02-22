<?php namespace App\StatsApp\Transformers;

/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */
abstract class Transformer {

	/**
	 * @param $items
	 * @return array
	 */
	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items->toArray());

	}

	/**
	 * @param $artist
	 * @return array
	 */
	public abstract function transform($artist);

}