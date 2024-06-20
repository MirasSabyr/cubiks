<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "style_reg.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="header">
        <nav>
         <ul>
          <li><a href="#p1">Главная</a></li>
          <li><a href="#p2">Каталог</a></li>
          <li><a href="#p3">Оплата</a></li>
          <li><a href="#p4">Почему Мы?</a></li>
          <li><a href="#p5">Контакты</a></li>
         </ul>
        </nav>
        <p class="text">Miras<br>Cubiks</p>
       <img src="kisspng-cube-three-dimensional-space-icon-cube-png-transparent-image-5a71d96e2ff5b9.6245027115174106701965.png" class="image">
    </div>
    <div class="page-1" id="p1"></div>
            <p class="text-1">MirasCubiks</p>
            <P class="text-2">Самый крупный интернет магазин в Казахстане</P>
            <p class="text-3">Сайт для заказа кубика рубика 3x3</p>
            <script>
                $(document).ready(function() {
                    $('form').on('submit', function(event) {
                        event.preventDefault();

                        var formData = $(this).serialize();

                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'), // исправленная строка
                            data: formData,
                            success: function(response) {
                                alert(response);
                            }
                        });
                    });
                });
            </script>
            <form action="regist.php" method="post">
                <input type="text" name="login" placeholder="login">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="repeatpass" placeholder="repeat password">
                <input type="text" name="e-mail" placeholder="e-mail">
                <button type="submit" name="register">Регистрация</button>
                <a href="aut.php">Войти</a>
                <h3>Регистрация</h3>
            </form>
     </div>
    <div class="futer">
            <h1 class="futer-text">MirasCubiks</h1>
            <a href="#"><img src="telegram.png" class="logo"></a>
            <a href="#"><img src="icons8-vk-50.png" class="logo"></a>
            <a href="#"><img src="pngwing.com.png" class="logo"></a>
       </div>    
</body>
</html>