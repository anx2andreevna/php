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
            <h1 class="header__title">ДЗ №1 Hello, World!</h1>
        </div> 
    </header>
    <main>
        <div class="wrapper">
            <div class="card">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <div>
                        <img src="img/<?php echo $i +
                            1; ?>.jpg" alt="" class="card__img">
                        <div class="card__content">
                            <h2 class="card__content__title">SORRYIMNOT</h2>
                            <p class="card__content__text">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores enim adipisci dolor reprehenderit minus nulla reiciendis natus pariatur, soluta debitis numquam non alias, dolorum iste tempora
                            </p>
                        </div>
                        <a href="#" class="card__link">MORE</a>
                    </div>
                <?php endfor; ?>
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