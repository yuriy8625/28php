<?php
session_start();
require_once "user.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if(isset($_POST['submit'])){
    $user = new User($users, $_POST['email'], $_POST['pass']);
}

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    echo "<div>Привет : ".$users[$id]['name']." ".$users[$id]['surname']."</div>";
}else {
    echo "<div> 
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

<!-- при отправке формы находим в массиве юзера по email
создаем класс пользователя с этими данными.
При повторном заходе на страницу пользователь если он залогинен,
не видит форму авторизации, а видит фразу "Привет Василий Пупкин." -->