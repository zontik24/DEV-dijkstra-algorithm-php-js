<?php 

include($_SERVER['DOCUMENT_ROOT'].'/src/resources/Graph.php');
include($_SERVER['DOCUMENT_ROOT'].'/src/resources/Dijkstra.php');

$arrayPathFrom = $_POST['pathFrom'];
$arrayPathTo = $_POST['pathTo'];
$arrayValue = $_POST['value'];
$beginPoint = $_POST['begin'];
$endPoint = $_POST['end'];

$arrayDist = Graph::create($arrayPathFrom, $arrayPathTo, $arrayValue); 
$calculationResult = Dijkstra::shortestPath($beginPoint, $endPoint, $arrayDist);

$resultData = [
	'len' => $calculationResult['length'],
	'trajectory' => $calculationResult['trajectory']
];

echo json_encode($resultData);