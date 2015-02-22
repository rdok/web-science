<?php namespace app\StatsApp\Importers;
/**
 * @author Rizart Dokollari
 * @since 2/22/15
 */


abstract class Importer {

	public abstract function import($item);
}