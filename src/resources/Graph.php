<?php

class Graph 
{
    /**
     * @param array $from
     * @param array $to
     * @param array $value
     * @return array
     */
    public static function create(array $from, array $to, array $value)
	{	
		$arr = array();
		for ($i=0; $i<count($from); $i++) {
			$arr[ $from[$i] ][ $to[$i] ] = $value[$i];
			$arr[ $to[$i] ][ $from[$i] ] = $value[$i];
		}
		return $arr;
	}
}