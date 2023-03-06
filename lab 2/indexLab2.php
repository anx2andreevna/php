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
        <div class="header wrapper">
            <img src="../img/logo_poly.png" alt="logo" class="header__img">
            <h1 class="header__title">ДЗ №2 Feedback form</h1>
        </div> 
    </header>
    <main>
        <div class="wrapper">
            <div class="wrapper__function">
                <textarea class="function__textarea" name="function" id="" cols="60" rows="20">
                    <?php print_r(get_headers('https://php.ru/manual/')); ?>
                </textarea>
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