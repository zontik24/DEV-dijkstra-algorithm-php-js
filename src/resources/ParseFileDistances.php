<?php

class ParseFileDistances 
{
	public static function convert($filePath) 
	{
		$arrayFrom = array();
		$arrayTo = array();
		$arrayValue = array();
		$file = fopen($filePath, "r");
		if ($file) 
		{
			while (!feof($file)) 
			{	
				$arrayStringElements = array();
				$currentFileString = fgets($file);
				$currentFileString = trim($currentFileString);
				$arrayStringElements = explode(' ', $currentFileString);
				$arrayFrom[] = $arrayStringElements[0];
				$arrayTo[] = $arrayStringElements[1];
				$arrayValue[] = $arrayStringElements[2];
			}
		}
		fclose($file);
		return [
			'from' => $arrayFrom,
			'to' => $arrayTo,
			'value' => $arrayValue
		];
	}
}