<?php
    if (isset($_POST['buttonClick']))
    {
        $nickname = $_POST['nickname'];
        setcookie("nick", $nickname);        
        session_start();
        $_SESSION['EMail'] = $_POST['email'];
        $EMail = $_SESSION['EMail'];
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
        <link rel="stylesheet" href="css/input.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    </head>

<body>

<div class="Footer">
    <div class="Container">
        <div class="Menu">
            <div class="Logo"><img src="img/logo.png" class="Logo_img"/></div>
            <div class="Menu_Items">
                <a class="Item" href="#">Новости</a>
                <a class="Item" href="#">Укромное местечко</a>
                <a class="Item" href="#">Энциклопедия</a>
                <p class="Email">
                    <?php 
                        echo $EMail;
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="Header">
    <div class="Container">
        <div class="Header_Items">
            <h1 class="Nick">
                Добро пожаловать
            </h1>

            <h1 class="Nick">
                <?php echo $_COOKIE['nick'] ?>
            </h1>
        </div>
    </div>
</div>

<?php
    
?>
</body>
</html>