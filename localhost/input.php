<?php
    if (isset($_POST['buttonClick']))
    {
        $nickname = $_POST['nickname'];
        setcookie("nick", $nickname);        
        //session_start();
        //$_SESSION['EMail'] = $_POST['email'];
        //$EMail = $_SESSION['EMail'];
        //if (isset($_COOKIE['nick']) && isset($_SESSION['EMail'])) 
        //echo "<p class='Nick'> Привет " . $_COOKIE["nick"] . " :3</p>
            //<p class='EMaile'> Красивая почта: $EMail :)</p>";

        //$mysql = new mysqli('localhost', 'Лаба', 'root', 'лаба');

        //if ($mysql->connect_errno) {
            //echo "Ошибочка: " . $mysql->connect_error;
        //}

        //if (!$mysql->query("INSERT INTO `users` (`Name`, `EMail`, `Phone`) VALUES ('{$_POST['nickname']}', '{$_POST['email']}', '{$_POST['phone']}')")) {
            //echo "Ошибочка: " . $mysql->error;
        //}
    }
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <title>Главное меню</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>

<body>

<div class="Footer">
    <div class="Container">
        <div class="Menu">
            <div class="Logo">Логотипчик :3</div>

            <div class="Menu_Items">
                <a class="Item" href="#">Обзоры</a>
                <a class="Item" href="#">Новости</a>
                <p class="Nick">
                    <?php echo $_COOKIE['nick'] ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
    
?>
</body>
</html>