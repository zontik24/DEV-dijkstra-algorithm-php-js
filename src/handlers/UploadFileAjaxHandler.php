<?php

exit('this section under development right now');

include($_SERVER['DOCUMENT_ROOT'].'/src/resources/ParseFileDistances.php');
include($_SERVER['DOCUMENT_ROOT'].'/src/resources/Graph.php');
include($_SERVER['DOCUMENT_ROOT'].'/src/resources/Dijkstra.php');
include($_SERVER['DOCUMENT_ROOT'].'/src/resources/File.php');

$beginPoint = $_POST['begin'];
$endPoint = $_POST['end'];

$uploaddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR;
$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
$mimeType = $_FILES["file"]["type"];	

if($extension == 'txt' && $mimeType == 'text/plain') 
{
	$_FILES['file']['name'] = 'file';
	$uploadfile = $uploaddir . $_FILES['file']['name'] . '.' . $extension;

	if(file_exists($uploaddir.$_FILES['file']['name'].'.txt')) {
		unlink($uploaddir.$_FILES['file']['name'].'.txt');
	}

	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))

	{
		$parseResult = ParseFileDistances::convert($uploaddir.$_FILES['file']['name'].'.txt');
		$arrayDist = Graph::create($parseResult['from'], $parseResult['to'], $parseResult['value']);
		$calculationResult = Dijkstra::shortestPath($beginPoint, $endPoint, $arrayDist);
		if ($arrayDist && $calculationResult['length'] && $calculationResult['trajectory']) {
			echo '<h5>Длина кратчайшего пути: '.$calculationResult['length'].'</h5>'; 
			echo '<h5>Траектория кратчайшего пути: '.$calculationResult['trajectory'].'</h5>';
		} else {
			echo '<h5>Путь не был найден</h5>'; 
		}
	}
}