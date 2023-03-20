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
            <h1 class="header__title">ДЗ №4 Solve the equation</h1>
        </div> 
    </header>
    <main>
        <div class="wrapper">
            <div class="equation">
                <p class="equation__heading">Введите уравнение</p>
                <form class="equation__form form" method="post">
                    <input class="form__input" type="text" placeholder="x+a=b" name="equation">
                    <button class="form__button" type="submit">Решить</button>
                </form>
                <p class="equation__answer">
                    <?php if (!empty($_POST)) {
                        $inputStr = $_POST['equation'];
                        $inputStr = str_replace(' ', '', $inputStr);
                        echo $inputStr . ' <br/>';
                        echo ' <br/>';
                        if (strpos($inputStr, '=') !== false) {
                            $parts = explode('=', $inputStr);
                            $leftPart = $parts[0];
                            $rightPart = $parts[1];
                            $rightNum = intval($rightPart);
                            $left = preg_split(
                                '//',
                                $leftPart,
                                -1,
                                PREG_SPLIT_DELIM_CAPTURE
                            );
                            if ($left[1] == 'x') {
                                $leftNum = intval($left[3]);
                                $operator = $left[2];
                                if ($operator == '+') {
                                    $x = $rightNum - $leftNum;
                                } elseif ($operator == '-') {
                                    $x = $leftNum + $rightNum;
                                } elseif ($operator == '/') {
                                    $x = $leftNum * $rightNum;
                                } elseif ($operator == '*') {
                                    $x = $rightNum / $leftNum;
                                }
                                echo 'Ответ: x = ' . $x;
                            } else {
                                $leftNum = intval($left[1]);
                                $operator = $left[2];
                                if ($operator == '+') {
                                    $x = $rightNum - $leftNum;
                                } elseif ($operator == '-') {
                                    $x = $leftNum - $rightNum;
                                } elseif ($operator == '/') {
                                    $x = $leftNum / $rightNum;
                                } elseif ($operator == '*') {
                                    $x = $rightNum / $leftNum;
                                }
                                echo 'Ответ: x = ' . $x;
                            }
                        }
                    } ?>
                </p>
            </div>
        </div>
    </main>
    <footer>
        <div class=" wrapper footer">
            <p>Выполнила студентка группы 221-322 Цветкова Анна Андреевна</p>
        </div>
    </footer>
</body>

</html>