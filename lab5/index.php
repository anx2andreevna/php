<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="wrapper">
            <img src="../img/logo_poly.png" alt="logo" class="header__img">
            <h1 class="header__title">ДЗ №5 Calculator</h1>
        </div> 
    </header>
    <main>
        <div class="wrapper">
            <div class="calculator" id="calculator">
                <form method="post">
                    <div class="calc-screen">
                        <label class="label">
                            <input class="screen" type="" name="case" value="">
                        </label>
                        <div class="container">
                            <button type="reset" class="reset">C</button>
                            <div class="screen result">
                        
                                <?php if (!empty($_POST['case'])) {
                                    function isNum($x)
                                    {
                                        if (!$x or !is_numeric($x)) {
                                            return false;
                                        }
                                        return true;
                                    }
                                    //без скобок
                                    function calculate($val)
                                    {
                                        if (!$val) {
                                            return 'Выражение не задано!';
                                        }
                                        if (isNum($val)) {
                                            return $val;
                                        }

                                        $args = explode('+', $val);
                                        if (count($args) > 1) {
                                            $sum = 0;

                                            for (
                                                $i = 0;
                                                $i < count($args);
                                                $i++
                                            ) {
                                                $arg = $args[$i];
                                                if (!isNum($arg)) {
                                                    $arg = calculate($arg); //если не число, то выражение?
                                                }
                                                $sum += $arg;
                                            }
                                            return $sum;
                                        }

                                        $args = explode('-', $val);
                                        if (count($args) > 1) {
                                            if (!isNum($args[0])) {
                                                $args[0] = calculate($args[0]);
                                            } else {
                                                $minuend = $args[0];
                                            }
                                            $minus = $minuend;
                                            for (
                                                $i = 1;
                                                $i < count($args);
                                                $i++
                                            ) {
                                                $arg = $args[$i];
                                                if (!isNum($arg)) {
                                                    $arg = calculate($arg);
                                                }
                                                $minus -= $arg;
                                            }
                                            return $minus;
                                        }

                                        $args = explode('*', $val);
                                        if (count($args) > 1) {
                                            $sup = 1;

                                            for (
                                                $i = 0;
                                                $i < count($args);
                                                $i++
                                            ) {
                                                $arg = $args[$i];
                                                if (!isNum($arg)) {
                                                    $arg = calculate($arg);
                                                }

                                                $sup *= $arg;
                                            }
                                            return $sup;
                                        }

                                        $args = explode('/', $val);
                                        if (count($args) > 1) {
                                            if (!isNum($args[0])) {
                                                $args[0] = calculate($args[0]);
                                            } else {
                                                $dividend = $args[0];
                                            }

                                            $quotient = $dividend;
                                            for (
                                                $i = 1;
                                                $i < count($args);
                                                $i++
                                            ) {
                                                $arg = $args[$i];
                                                if (!isNum($arg)) {
                                                    $arg = calculate($arg);
                                                }
                                                if ($arg == 0) {
                                                    return 'Делить на 0 нельзя';
                                                } else {
                                                    $quotient /= $arg;
                                                }
                                            }
                                            return $quotient;
                                        }
                                        return 'Недопустимое выражение';
                                    }

                                    //со скобками
                                    //корректность  расстановки  скобок  в  выражении
                                    function SqValidator($val)
                                    {
                                        $open = 0;
                                        for ($i = 0; $i < strlen($val); $i++) {
                                            if ($val[$i] == '(') {
                                                $open++;
                                            } else {
                                                if ($val[$i] == ')') {
                                                    $open--;
                                                    if ($open < 0) {
                                                        return false;
                                                    }
                                                }
                                            }
                                        }

                                        // если количество открывающихся и закрывающихся скобок разное
                                        if ($open !== 0) {
                                            return false;
                                        }

                                        return true;
                                    }

                                    function calculateSq($val)
                                    {
                                        // проверка на корректность использования скобок в выражении
                                        if (!SqValidator($val)) {
                                            return 'Неправильная расстановка скобок';
                                        }

                                        $start = strpos($val, '('); // ищем первую открывающуюся скобку
                                        if ($start === false) {
                                            return calculate($val);
                                        }

                                        // ищем соответствующую открывающейся закрывающуюся скобку
                                        $end = $start + 1;
                                        $open = 1;

                                        // цикл пока скобка не найдена или не дошли до конца строки
                                        // признаком найденной скобки является обнуление счетчика скобок
                                        while ($open && $end < strlen($val)) {
                                            if ($val[$end] == '(') {
                                                $open++;
                                            }
                                            if ($val[$end] == ')') {
                                                $open--;
                                            }
                                            $end++;
                                        }

                                        // формируем новое выражение, путем замены содержимого скобок на вычисленное
                                        $new_val = substr($val, 0, $start); // часть исходного выражение левее скобок
                                        $new_val .= calculateSq(
                                            substr(
                                                $val,
                                                $start + 1,
                                                $end - $start - 2
                                            )
                                        ); // часть в скобках
                                        $new_val .= substr($val, $end); // часть исходного выражение правее скобок

                                        return calculateSq($new_val);
                                    }
                                    $res = calculateSq($_POST['case']);
                                    echo $res;
                                } ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="buttons">
                        <div class = "btn seven">7</div>
                        <div class = "btn eight">8</div>
                        <div class = "btn nine">9</div>
                        <div class="operator btn plus">+</div>
                        <div class = "btn four">4</div>
                        <div class = "btn five">5</div>
                        <div class = "btn six">6</div>
                        <div class="operator btn minus">-</div>
                        <div class = "btn one">1</div>
                        <div class = "btn two">2</div>
                        <div class = "btn three">3</div>
                        <div class="operator btn devision">/</div>
                        <div class = "btn zero">0</div>
                        <div class = "btn bracket-opening">(</div>
                        <div class = "btn bracket-closing">)</div>
                        <div class="operator btn multi">*</div>
                        <button class="equal" type="submit">=</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src = "index.js"></script>
    <footer>
        <div class=" wrapper footer">
            <p>Выполнила студентка группы 221-322 Цветкова Анна Андреевна</p>
        </div>
    </footer>
</body>

</html>