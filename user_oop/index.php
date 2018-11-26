<?php
session_start();
require_once "user.php";
require_once "recaptcha.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<?php
   
// если существует запрос создаем обьект и аунтефицируем пользователя
if(isset($_POST['submit'])){
    $user = new User($users, $_POST['email'], $_POST['pass']);
    $user->autendificated($_POST['pass']);
}

// считаем кол-во не правильных входов
if(empty($_SESSION['id'])){ 
    $_SESSION['error']++;  
}

//Если пользователь существует - приветствие, если ввел не правильно пароль 5 раз появляется каптча
// или же просто форма входа
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    echo "<div class=\"login\">Привет : ".$users[$id]['name']." ".$users[$id]['surname']."</div>";
}elseif($_SESSION['error'] >= 6){
    echo "<div class=\"login\"> 
            <form action=\"\" method=\"POST\">
                <div class=\"g-recaptcha\" data-sitekey=\"6LfaH30UAAAAALFr_HUeRmzgyZxTfpQt3WXcauq7\"></div>
                <input type=\"submit\" name=\"submit\" value=\"Войти\"><br>
            </form>
        </div>";
    $_SESSION['error'] = 0;
}else {
    echo "<div class=\"login\"> 
            <form action=\"\" method=\"POST\">
                <label for=\"email\">Email:
                  <input type=\"email\" name=\"email\"><br><br>
                </label>
                 <label for=\"pass\">Password:
                    <input type=\"pass\" name=\"pass\"><br><br>
                </label>
                <input type=\"submit\" name=\"submit\" value=\"Войти\"><br>
            </form>
        </div>";
}
?>
</body>
</html>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>