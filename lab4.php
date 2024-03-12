<?php
    session_start();

    if (!empty($_POST['problem'])) {
        $problem = $_POST['problem'];
        $result = calculator(bracket($problem)); //собственно, прежде чем посчитать операцию, надо решить выражения в скобках.
        echo $result; //Возвращаем полчученный результат
    }

    function calculator($problem) {
        switch (true){
            case substr_count($problem, '+') > 0: //Если есть знак + в строке
                $plus = explode('+', $problem); // Создается массив из чисел, которые стояли рядом с плюсом
                $result = calculator($plus[0]); // Первый элемент массива обрабатывается этой же функцией, то есть по сути в него записывается число
                foreach (array_slice($plus, 1) as $elem) {// А в этом цикле обрабатываются остальные числа
                    $result += calculator($elem); //Складываеются числа из массива
                }
                return $result;
            case substr_count($problem, '-') > 0: // В последующих кейсах такой же алгоритм работы, только с другим знаком
                $minus = explode('-', $problem);
                $result = calculator($minus[0]);
                foreach (array_slice($minus, 1) as $elem) {
                    $result -= calculator($elem);
                }
                return $result;
            case substr_count($problem, '*') > 0:
                $multi = explode('*', $problem);
                $result = calculator($multi[0]);
                foreach (array_slice($multi, 1) as $elem) {
                    $result *= calculator($elem);
                }
                return $result;
            case substr_count($problem, '/') > 0:
                $division = explode('/', $problem);
                $result = calculator($division[0]);
                foreach (array_slice($division, 1) as $elem) {
                    $result /= calculator($elem);
                }
                return $result;
            default: return (int)$problem; //Возращает целое число - результат простейшего ввыражения(типо 7+4)
                
        }
    }

    function bracket($problem) {
        while (substr_count($problem, '(') > 0) { // Пока есть скобка
            $closeBracket = strpos($problem, ')');//Находим индекс первой закрывающейся скобки
            $openBracket = strrpos(substr($problem, 0, $closeBracket), '('); // Находим последную открывающую скобку, при том условии, что мы ищем до элемента первой закрывающейся скобки
            $problem = substr_replace($problem, calculator(substr($problem, $openBracket+1, $closeBracket-$openBracket+1)), $openBracket, $closeBracket-$openBracket+1); // Заменяет выражение в самой приоритетной скобке на его результат
        }
        return $problem; //Возвращает простейшую математическую операцию
    }
?>