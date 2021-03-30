<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <form action="input.php" method="POST">
        <div class="background">
            <div class="registration_block">
                <p class="registration">Регистрация</p>
                <p class="registration"><input class="nickname" type="text" placeholder="Имя пользователя" name="nickname" value="123"></p>
                <p class="registration"><input class="email" type="text" placeholder="E-mail" name="email"></p>
                <p class="registration"><input class="phone" type="text" placeholder="Номер телефона" name="phone"></p>
                <button class="button" type="submit" name="buttonClick">Зарегистрироваться</button>
            </div>
        </div>
    </form>
  </body>
</html>