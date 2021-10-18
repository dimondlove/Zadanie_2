<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>Калькулятор</title>
</head>
<body>
	<div class="container-fluid text-center">
		<h1>Калькулятор</h1>
		<h2>Введите числа и выберите операцию</h2>
		<form action="" method="post" class="row g-3 justify-content-center">
			<div class="col-12 col-lg-3">
				<input type="text" class="form-control" name="number_1" placeholder="Первое число">
			</div>

			<div class="col-4 col-lg-2">
				<select name="operation" class="form-select">
					<option value="plus">+</option>
					<option value="minus">-</option>
					<option value="multiply">*</option>
					<option value="divide">/</option>
				</select>
			</div>

			<div class="col-12 col-lg-3">
				<input type="text" class="form-control" name="number_2" placeholder="Второе число">
			</div>

			<div class="col-12">
				<button type="submit" class="btn btn-primary" name="submit">Получить ответ</button>
			</div>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>

<?php 
	
	if (isset($_POST['submit'])) {
		// Записываем данные в переменные
		$number_1 = $_POST['number_1'];
		$number_2 = $_POST['number_2'];
		$operation = $_POST['operation'];

		// Проверяем все ли поля заполнены
		if (!$operation || (!$number_1 && $number_1 != '0') || (!$number_2 && $number_2 != '0')) {
			$error = 'Вы заполнили не все поля';
		}
		else {

			//Проверяем являются ли введённые значения числами
			if(!is_numeric($number_1) || !is_numeric($number_2)) {
				$error = "Введённые значения должны быть числами";
			}
			//Если ошибок не найдено
			else {
				switch ($operation) {
					case 'plus':
						$result = $number_1 + $number_2;
						break;
					
					case 'minus':
						$result = $number_1 - $number_2;
						break;

					case 'multiply':
						$result = $number_1 * $number_2;
						break;

					case 'divide':
						//Если второе число равно нулю
						if($number_2 == '0') {
							$error = "На ноль делить нельзя!";
						}
						else {
							$result = $number_1 / $number_2;
						}
						break;
				}
			}

		}

		if(isset($error)) {
			echo "<div class='container-fluid text-center'>";
			echo "<div class='text-danger'><h3>Ошибка: $error</h3></div>";
			echo "</div>";
		}
		else {
			echo "<div class='container-fluid text-center'>";
			echo "<div class='text-success'><h3>Ответ: $result</h3></div>";
			echo "</div>";
		}

	}

?>