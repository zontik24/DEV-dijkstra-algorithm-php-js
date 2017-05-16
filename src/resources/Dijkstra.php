<?php

class Dijkstra
{
	public static function shortestPath($a, $b, $_distArr)
	{
		//initialize the array for storing
	    $S = array();//the nearest path with its parent and weight
	    $Q = array();//the left nodes without the nearest path
	    foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
	    $Q[$a] = 0;

	    //start calculating
	    while(!empty($Q))
	    {
	        $min = array_search(min($Q), $Q);//the most min weight
	        if($min == $b) break;
	        foreach($_distArr[$min] as $key=>$val)
	        {
	            if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key])
	            {
	                $Q[$key] = $Q[$min] + $val;
	                $S[$key] = array($min, $Q[$key]);
	            }
	        }
	        unset($Q[$min]);
	    }

	    //list the path
	    $path = array();
	    $pos = $b;
	    while($pos != $a)
	    {
	        if (!array_key_exists($b, $S))
	        {
	            return false;
	        }
	        $path[] = $pos;
	        $pos = $S[$pos][0];
	    }
	    $path[] = $a;
	    $path = array_reverse($path);

	    return [
	    	'length' => $S[$b][1],
	    	'trajectory' => implode('->', $path),
	    ];
	}
}

