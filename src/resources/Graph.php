<?php 
class Graph 
{
	public static function create($from, $to, $value) 
	{	
		$arr = array();
		for ($i=0; $i<count($from); $i++) 
		{
			$arr[ $from[$i] ][ $to[$i] ] = $value[$i];
			$arr[ $to[$i] ][ $from[$i] ] = $value[$i];
		}
		return $arr;
	}
}