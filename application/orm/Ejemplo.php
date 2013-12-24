<?php
class Ejemplo extends QuarkORM
{
	public static $table = 'ejemplo';
	public static $connection = 'default';
	
	public static function query()
	{
		return new QuarkORMQueryBuilder(__CLASS__);
	}
	
	
	/*
	 * Metodos exclusivos
	 */
	
	protected function validate()
	{
		if($this->title_es == ''){
			return false;
		} else
		return true;
	}
	
}