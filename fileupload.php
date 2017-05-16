<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jq.js"></script>
	<title>Document</title>
</head>
<body>
<style>button {cursor: pointer;}</style>
<script>
	$(document).ready(function() {

		$("form[name='fileForm']").submit(function(e) { 
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: 'src/handlers/UploadFileAjaxHandler.php',
                    type: "POST",
                    data: formData,
                    async: false,
                    success : function (data) {
			    		$('#calcResult').html(data);
		        	},
                    error: function(msg) {
                        alert('Ошибка!');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                e.preventDefault();
            });

	});
</script>
<div class="container">
	<br>
	<div class="row">
		<a href="fileupload.php" class="btn btn-primary">Загрузить матрицу из файла</a>
		&nbsp;
		<a href="/" class="btn btn-primary">Вручную</a>
	</div>
	<br>
	<form name="fileForm" id="fileForm" enctype="multipart/form-data" method="POST">
		<div id="input-list">
			<div class="row">
				<div class="col-xs-4">
					Точка отправления <input class="form-control" type="text" name="begin" value="0">
				</div>
				<div class="col-xs-4">
					Точка прибытия <input class="form-control" type="text" name="end" value="0">
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-xs-8">
				Загрузка файла c путями <input class="form-control" type="file" name="file">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12">
				<button class="btn btn-success" type="submit" name="submit" id="submit">&rarr; Определить кратчайший путь &larr;</button>
			</div>
		</div>
	</form>
	<br>
	<div id="calcResult"></div>
</div>
</body>
</html>