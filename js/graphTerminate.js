$(document).ready(function() {

	function extractValuesFromField(fieldSelector) {
		var fields = $(fieldSelector);
		var resultArray = [];
		for(var i=0; i<fields.length; i++) {
			resultArray[i] = fields[i].value; 
		}
		return resultArray;
	}

	function drawGraph(fromValuesArray, toValuesArray, distanceValuesArray, shortestPathTrajectoryArray) {

		var g = new Graph();

		for(var i=0; i<fromValuesArray.length; i++) {
			g.addEdge(fromValuesArray[i], toValuesArray[i], {
				label: distanceValuesArray[i],
				'font-size' : '17px',
			});
		}

		for(var i=0; i<shortestPathTrajectoryArray.length-1; i++) {
			g.addEdge(fromValuesArray[i], toValuesArray[i], {
				stroke: 'green', 
				fill: 'green',
			});
		}

		var layouter = new Graph.Layout.Spring(g);
		layouter.layout();

		var renderer = new Graph.Renderer.Raphael('canvas', g, 500, 400);
		renderer.draw();
	}


	$('#submit').on('click',  function() {
		var form = $("#dijForm").serialize();
		$.ajax({
			url : "src/handlers/DijkstraAjaxHandler.php", 
			type : "POST",
			dataType: "html",
			data : form,
			success : function(data) {

				var data = Object.values(JSON.parse(data));

				var shortestPathLength = data[0];
				var shortestPathTrajectoryArray = data[1];
				var fromValuesArray = extractValuesFromField('.fromField');
				var toValuesArray = extractValuesFromField('.toField');
				var distanceValuesArray = extractValuesFromField('.distanceField');

				$('#calcResult').html('<h5>Длина кратчайшего пути: '+shortestPathLength+'</h5>');

				$('#canvas').empty();

				drawGraph(fromValuesArray, toValuesArray, distanceValuesArray, shortestPathTrajectoryArray);
			} 
		});
	
	});

	$('#add').on('click', function() {
		$('#input-list').append('<div class="row"><div class="col-xs-4">Из точки<input class="form-control fromField" type="text" name="pathFrom[]" value="0"></div><div class="col-xs-4">В точку<input class="form-control toField" type="text" name="pathTo[]" value="0"></div><div class="col-xs-4">Расстояние<input class="form-control distanceField" type="number" min="1" name="value[]" value="1"></div></div>');
	});

});