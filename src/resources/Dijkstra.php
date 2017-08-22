<?php

class Dijkstra
{
    /**
     * @param $a
     * @param $b
     * @param $_distArr
     * @return array|bool
     */
    public static function shortestPath($a, $b, $_distArr)
	{
	    $S = array();
	    $Q = array();
	    foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
	    $Q[$a] = 0;

	    while(!empty($Q))
	    {
	        $min = array_search(min($Q), $Q);
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
	    	//'trajectory' => implode('->', $path),
	    	'trajectory' => $path,
	    ];
	}
}

