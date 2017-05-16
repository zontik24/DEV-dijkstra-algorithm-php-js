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

if ($arrayDist && $calculationResult['length'] && $calculationResult['trajectory']) {
	echo '<h5>Длина кратчайшего пути: '.$calculationResult['length'].'</h5>'; 
	echo '<h5>Траектория кратчайшего пути: '.$calculationResult['trajectory'].'</h5>';
} else {
	echo '<h5>Путь не был найден</h5>'; 
}














	// $_distArr = array();
	// $_distArr[1][3] = 9;
	// $_distArr[1][6] = 14;
	// $_distArr[2][1] = 7;
	// $_distArr[2][3] = 10;
	// $_distArr[2][4] = 15;
	// $_distArr[3][1] = 9;
	// $_distArr[3][2] = 10;
	// $_distArr[3][4] = 11;
	// $_distArr[3][6] = 2;
	// $_distArr[4][2] = 15;
	// $_distArr[4][3] = 11;
	// $_distArr[4][5] = 6;
	// $_distArr[5][4] = 6;
	// $_distArr[5][6] = 9;
	// $_distArr[6][1] = 14;
	// $_distArr[6][3] = 2;
	// $_distArr[6][5] = 9;

















// 	echo "<pre>";
// print_r($_distArr);
// echo "</pre>";

// echo "-----";


// echo "<pre>";
// print_r($_distArr);
// echo "</pre>";