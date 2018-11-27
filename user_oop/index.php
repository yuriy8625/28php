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
// считаем кол-во не правильных входов
if(empty($_SESSION['id'])){ 
    $_SESSION['error']++;  
}

// Выовд каптчи
if($_SESSION['error'] >= 6){
    $error = "<div class=\"g-recaptcha\" data-sitekey=\"6LfaH30UAAAAALFr_HUeRmzgyZxTfpQt3WXcauq7\"></div>";
}

// Аунтификация с учетом каптчи
if($data->success){
    $user = new User($users, $_POST['email'], $_POST['pass']);
    $user->autendificated($_POST['pass']);
}

// Аунтификация если ошибок меньше 5
if(isset($_POST['submit']) && !isset($_POST['g-recaptcha-response'])){
    $user = new User($users, $_POST['email'], $_POST['pass']);
    $user->autendificated($_POST['pass']);
}

// Вывод
if(isset($_SESSION['id'])){

    $_SESSION['error'] = 0;
    $error = "";
    $id = $_SESSION['id'];
    echo "<div class=\"login\">Привет : ".$users[$id]['name']." ".$users[$id]['surname']."</div>";
}else {
    echo "<div class=\"login\"> 
            <form action=\"\" method=\"POST\">
                <label for=\"email\">Email:
                  <input type=\"email\" name=\"email\"><br><br>
                </label>
                 <label for=\"pass\">Password:
                    <input type=\"pass\" name=\"pass\"><br><br>
                </label>
                ".$error."
                <input type=\"submit\" name=\"submit\" value=\"Войти\"><br>
            </form>
        </div>";
}
?>
</body>
</html>
