<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 2/24/15
 */

namespace App\StatsApp\Transformers;


class TagTransformer extends Transformer {

	/**
	 * @param $tag
	 * @return array
	 */
	public function transform($tag)
	{
		return [
			'name'       => $tag['name'],
			'created_at' => $tag['created_at']
		];
	}
}