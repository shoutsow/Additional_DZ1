<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вместо ДЗ</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js"></script>
</head>
<body>
<?php

echo "<br>1. Есть имя Steve. 

Если возраст Steve:
    от 0 до 12 - вывести Steve is a child
    с 12 до 18 - вывести Steve is a teenager
иначе 
    - вывести Steve is an adult

Решить задачу 3 – способами:
    1 if-else
    2 switch.
    3 Условный (тернарный) оператор.<br><br>";

function who_is_Steve($age) {
	$name = 'Steve';
	if ($age >= 0 && $age < 12) {
		return "$name is a child";
	}
	else if ($age >= 12 && $age < 18) {
		return "$name is a teenager";
	} else {
		return "$name is an adult";
	}
}

function who_is_Steve2($age) {
	switch ($age) {
		case($age >= 0 && $age < 12):
			return 'Steve is a child';
		case($age >= 12 && $age < 18):
			return 'Steve is a teenager';
		default:
			return 'Steve is an adult';
	}
}

function who_is_Steve3($age) {
	$steve_is = '';
	($age >= 0 && $age < 12) ? $steve_is = 'Steve is a child' : '';
	($age >= 12 && $age < 18) ? $steve_is = 'Steve is a teenager' : '';
	$age > 18 ? $steve_is = 'Steve is an adult' : '';
	return $steve_is;
}

echo 'Вызываем функцию who_is_Steve() с аргументом $age = 7 и получаем возврат: ' . who_is_Steve(7) . '<br>';
echo 'Вызываем функцию who_is_Steve2() с аргументом $age = 15 и получаем возврат: ' . who_is_Steve2(15) . '<br>';
echo 'Вызываем функцию who_is_Steve3() с аргументом $age = 30 и получаем возврат: ' . who_is_Steve3(30) .
	 '<br><br><hr>';


echo "<br>2. Написать с помощью цикла while и for «переворот» числа. Другими словами, нужно создать новое число, 
	 у которого цифры шли бы в обратном порядке (например: 472 -> 274).<br><br>";

function number_rev($num) {
	$num .= '';
	$new_num = '';
	for ($i = (strlen($num) - 1); $i >= 0; $i--) {
		$new_num .= $num[$i];
	}
	return +$new_num;
}

function number_rev2($num) {
    $num .= '';
    $new_num = '';
    $i = (strlen($num) - 1);
    while ($i >= 0) {
        $new_num .= $num[$i];
        $i--;
    }
    return +$new_num;
}

echo 'Вызываем функцию number_rev() с аргументом $num = 12345 и получаем возврат: ' . number_rev(12345) .
	'<br>';
echo 'Вызываем функцию number_rev2() с аргументом $num = 56789 и получаем возврат: ' . number_rev2(56789) .
    '<br><br><hr>';


echo "<br>3. Посчитайте кол-во отрицательных, положительных элементов, элементов со строчным типом данных в 
	 произвольном массиве, а также кол-во элементов других типов.<br><br>";

function arr_elements($arr = []) {
	$neg = 0;
	$pos = 0;
	$str = 0;
	$other = 0;
	foreach ($arr as $value) {
		//echo "<br>$value<br>";
		if ($value < 0) {
			$neg += 1;
		}
		elseif ($value > 0 && !is_array($value) && !is_bool($value)) {
			$pos += 1;
		}
		elseif (is_string($value)) {
			$str += 1;
		} else {
			$other += 1;
		}
	}
	echo "В массиве [12, 136, -44, 0, -3, 66, false, [3, 'wasd', 4], 'Вова', 'красавчик', true] обнаружено<br> 
		 Отрицательных: " . $neg . '<br>' . "Положительных: " . $pos . '<br>' . "Элементов со строчным типом данных: "
		 . $str . '<br>' . "Элементов других типов: " . $other . '<br><br><hr>';
}
arr_elements([12, 136, -44, 0, -3, 66, false, [3, 'wasd', 4], 'Вова', 'красавчик', true]);


echo "<br>4. Напишите функцию, которая проверяет, является ли переданная строка палиндромом.<br><br>";

function is_pal($str) {
	$rev_str = '';
	for ($i = (strlen($str) - 1); $i >= 0; $i--) {
		$rev_str .= mb_substr($str, $i, 1);
	}
	//echo $rev_str;
	if ($str === $rev_str) {
		return 'переданная строка палиндром';
	} else {
		return 'переданная строка не палиндром';
	}
}
echo 'Вызываем функцию is_pal() с аргументом $str = "наворован" и получаем возврат: ' . is_pal('наворован') .
	 '<br>';
echo 'Вызываем функцию is_pal() с аргументом $str = "вафелька" и получаем возврат: ' . is_pal('вафелька') .
     '<br><br><hr>';


echo "<br>5. Дан массив с произвольными значениями. Проверить, есть ли в нем одинаковые элементы. Вывести в консоль: 
	 “Есть повторки!”, “Нет повторок”.<br><br>";

function if_doubles($arr) {
    $flag = true;
    for ($i = 0; $i < count($arr); $i++) {
        if (!$flag) {
            break;
        }
        for ($j = ($i + 1); $j < count($arr); $j++) {
            if ($arr[$i] === $arr[$j]) {
                $flag = false;
            }
            if (!$flag) {
                break;
            }
        }
    }
    if ($flag) {
        return 'Нет повторок';
    } else {
        return 'Есть повторки!';
    }
}
echo 'Вызываем функцию if_doubles() с аргументом $arr = [1, 3, 6, 8, 3, 10, 5] и получаем возврат: ' .
     if_doubles([1, 3, 6, 8, 3, 10, 5]) . '<br>';
echo 'Вызываем функцию if_doubles() с аргументом $arr = [1, 3, 6, 8, 7, 10, 5] и получаем возврат: ' .
     if_doubles([1, 3, 6, 8, 7, 10, 5]) . '<br><br><hr>';


echo "<br>6. Необходимо написать программу, которая проверяет пользователя на знание таблицы умножения. Пользователь 
     сам вводит два целых однозначных числа. Затем вводит результат умножения и в результате должен увидеть на экране 
     правильно он ответил или нет.<br><br>";

?>

<p>Введите множители и произведение ниже.</p><br>
<form action="#" method="post" >
    <label for="mul1">1-й множитель:</label>
    <input type="text" placeholder="число от 2 до 9" id="mul1" name="mul1"><br><br>
    <label for="mul2">2-й множитель:</label>
    <input type="text" placeholder="число от 2 до 9" id="mul2" name="mul2"><br><br>
    <label for="p_o_n">Произведение:</label>
    <input type="text" placeholder="Произведение" id="p_o_n" name="p_o_n"><br><br>
    <input type="submit" value="Отправить">
</form>

<?php

function mul_table_check() {
    if (is_numeric($_POST['mul1']) && is_numeric($_POST['mul2'])) {
        return (int)$_POST['mul1'] * (int)$_POST['mul2'];
    } else {
        return 'ошибка или нет множителей';
    }
}
echo '<br>' . 'А а на самом деле: ' . $_POST['mul1'] . ' X ' . $_POST['mul2'] . ' = ' . mul_table_check() . '<br><br><hr>';


echo "<br>8. У треугольника сумма любых двух сторон должна быть больше третьей. Иначе две стороны просто «лягут» на 
     третью и треугольника не получится. Пользователь вводит поочерёдно длины трех сторон. Используя конструкцию 
     if..else (один раз), напишите код, который должен определять, может ли существовать треугольник при таких длинах. 
     Т. е. нужно сравнить суммы двух любых строн с оставшейся третьей стороной. Чтобы треугольник существовал, сумма 
     всегда должна быть больше отдельной стороны.<br><br>";

?>

<p>Введите длины сторон треугольника.</p><br>
<form action="#" method="post" >
    <label for="side1">1-я сторона:</label>
    <input type="text" placeholder="число" id="side1" name="side1"><br><br>
    <label for="side2">2-я сторона:</label>
    <input type="text" placeholder="число" id="side2" name="side2"><br><br>
    <label for="side3">3-я сторона:</label>
    <input type="text" placeholder="число" id="side3" name="side3"><br><br>
    <input type="submit" value="Отправить">
</form>

<?php

function if_triangle_check() {
    if (is_numeric($_POST['side1']) && is_numeric($_POST['side2']) && is_numeric($_POST['side3']) &&
       ((int)$_POST['side1'] + (int)$_POST['side2']) > (int)$_POST['side3'] &&
       ((int)$_POST['side1'] + (int)$_POST['side3']) > (int)$_POST['side2'] &&
       ((int)$_POST['side3'] + (int)$_POST['side2']) > (int)$_POST['side1']) {
       return 'треугольник возможен';
    } else {
        return 'треугольник невозможен или длины сторон введены некорректно';
    }
}
echo '<br>' . 'С такими длинами сторон: ' . $_POST['side1'] . ', ' . $_POST['side2'] . ', ' . $_POST['side3'] . ' ' .
     if_triangle_check() . '<br><br><hr>';


echo "<br>9. Необходимо вывести на экран числа от 50 до 1 с шагом 2, 5 и 10.<br><br>";

function from_50_to_step($step) {
	for ($i = 50; $i > 1; $i--) {
		if ($i % $step == 0) {
			$temp = $i;
			echo "$temp ";
		}
	}
}
echo " - вызываем функцию from_50_to_step() с аргументом \$step = 2." .
	from_50_to_step(2) . '<br>';
echo " - вызываем функцию from_50_to_step() с аргументом \$step = 5." .
	from_50_to_step(5) . '<br>';
echo " - вызываем функцию from_50_to_step() с аргументом \$step = 10." .
	from_50_to_step(10) . '<br><br><hr>';


echo "<br>7. Заданы два массива. Один содержит наименование услуг, а другой – расценки за эти услуги. 
	 Выведите список услуг стоимостью больше 0 на экран.<br><br>";
echo "Массивы заданы такие: \$arr_serv = ['Пожелать доброго утра', 'Стирка', 'Полоскание', 'Сушка', 'Глажка', 
'Раскладывание по полкам'] и \$arr_cost = [0, 100, 30, 30, 70, 25]<br><br>";

function cost_more_0() {
    $arr_serv = ['Пожелать доброго утра', 'Стирка', 'Полоскание', 'Сушка', 'Глажка', 'Раскладывание по полкам'];
    $arr_cost = [0, 100, 30, 30, 70, 25];

    for ($i = 0; $i < count($arr_cost); $i++) {
        if ($arr_cost[$i] > 0) {
            echo ($arr_serv[$i] . ' стоит ' . $arr_cost[$i] . ' $<br>');
        }
    }
}
cost_more_0();
echo '<br><hr>';


echo "<br>10. Вывести на экран «прямоугольник», образованный из двух видов символов. Контур прямоугольника должен 
     состоять из одного символа, а в «заливка» — из другого.<br><br>##############################<br>
     #0000000000000000000000000000#<br>#0000000000000000000000000000#<br>#0000000000000000000000000000#<br>
     #0000000000000000000000000000#<br>##############################<br>";

function pattern($height = 5, $length = 5, $ch_border = '*', $ch_bg = '0') {
    $str_line = '';
    for ($i = 1; $i <= $height; $i++) {
        $bg_line = '';
        for ($j = 1; $j <= $length; $j++) {
            $bg_line .= ($i == 1 || $i == $height) ? $ch_border : $ch_bg;
        }
        $str_line .= $ch_border . $bg_line . $ch_border . '<br>';
    }
    echo $str_line;
}
echo '<br>';

pattern(6, 28, 'N', 'O');
echo '<br><hr>';

?>

</body>
</html>