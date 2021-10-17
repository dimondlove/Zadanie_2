<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
</head>
<body>
	<h1>Калькулятор</h1>
	<h2>Введите числа и выберите операцию</h2>
	<form action="" method="post">
		<input type="text" name="number_1" placeholder="Первое число">
		<select name="operation">
			<option value="plus">+</option>
			<option value="minus">-</option>
			<option value="multiply">*</option>
			<option value="divide">/</option>
		</select>
		<input type="text" name="number_2" placeholder="Второе число">

		<input type="submit" name="submit" value="Получить ответ">
	</form>
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
			$error = "Вы заполнили не все поля";
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

			if(isset($error)) {
				echo "Ошибка: $error";
			}
			else {
				echo "Ответ: $result";
			}


		}

	}

?>