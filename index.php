<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jq.js"></script>
	<script type="text/javascript" src="js/draculaJS/raphael-min.js"></script>
	<script type="text/javascript" src="js/draculaJS/dracula_graffle.js"></script>
	<script type="text/javascript" src="js/draculaJS/dracula_graph.js"></script>
	<script type="text/javascript" src="js/graphTerminate.js"></script>
	<title>Document</title>
</head>
<body>
<style>input[type='button'] {cursor: pointer;}</style>
<div class="container">
	<br>
	<div class="row">
		<a href="fileupload.php" class="btn btn-primary">Загрузить матрицу из файла</a>
		&nbsp;
		<a href="/" class="btn btn-primary">Вручную</a>
	</div>
	<br>
	<form name="dijForm" id="dijForm">
		<div id="input-list">
			<div class="row">
				<div class="col-xs-4">
					Точка отправления <input class="form-control" type="text" name="begin" value="0">
				</div>
				<div class="col-xs-4">
					Точка прибытия <input class="form-control" type="text" name="end" value="0">
				</div>
			</div>
			<div class="row">
				<h4>Построение путей</h4>
			</div>		
			<div class="row">
				<div class="col-xs-3">
					Из точки<input class="form-control fromField" type="text" name="pathFrom[]" value="0">
				</div>
				<div class="col-xs-3">
					В точку<input class="form-control toField" type="text" name="pathTo[]" value="0">
				</div>
				<div class="col-xs-3">
					Расстояние <input class="form-control distanceField" type="number" min="1" name="value[]" value="1">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<input class="btn btn-sm btn-primary" type="button" id="add" value="+ Добавить новый путь">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12">
				<input class="btn btn-success" type="button" name="submit" id="submit" value="&rarr; Определить кратчайший путь &larr;">
			</div>
		</div>
	</form>
	<br>
	<div id="calcResult"></div>
	<div id="canvas"></div>
</div>
</body>
</html>