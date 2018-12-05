<?php
session_start();
require_once "user.php";
require "function.php";
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
//Кнопка выхода
if(isset($_POST['out'])) {
    $_SESSION = [];
}

if(isset($_POST['submit'])){
    foreach ($users as $key=>$value){
        if($_POST['pass'] == $value['password']  && $value['role'] == 1 && $_POST['email'] == $value['email']){
            $user = new User($key, $value['password']);           
        }
        if($_POST['pass'] == $value['password'] && $value['role'] == 2 && $_POST['email'] == $value['email']){
            $user = new Admin($key, $value['password']);       
        }
        if($_POST['pass'] == $value['password']  && $value['role'] == 3 && $_POST['email'] == $value['email']){
            $user = new Sales_manadger($key, $value['password']);          
        }
        if($_POST['pass'] == $value['password']  && $value['role'] == 4 && $_POST['email'] == $value['email']){
            $user = new User($key, $value['password']);           
        }
        if($_POST['pass'] == $value['password']  && $value['role'] == 5 && $_POST['email'] == $value['email']){
            $user = new User($key, $value['password']);
        }
    }

    $user->autendificated($_POST['pass']);
    $user->productEdit();

}

$_SESSION['ob'] = $user;
// Вывод
if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];
    echo "<div class=\"login\">Привет : ".$users[$id]['name']." ".$users[$id]['surname']."
            <form action=\"\" method=\"POST\">
                <input  class=\"inLog\"  type=\"submit\" name=\"out\" value=\"Выйти\"><br>
            </form>
    </div>";
    echo "<div class=\"right\"><form action=\"\" method=\"POST\">
    <legend>Редактирование товаров</legend><br>

    <label for=\"count\">Изменение количества:
        <input type=\"number\" name=\"count\" value=\"\"><br><br>
    </label>
    <label for=\"name_product\">Название товара:
        <input type=\"text\" name=\"name_product\" value=\"\"><br><br>
    </label>
    <label for=\"product_info\">Описание товара:
        <input type=\"text\" name=\"product_info\" value=\"\"><br><br>
    </label>
    <label for=\"price\">Изменение цены:
        <input type=\"number\" name=\"price\" value=\"\"><br><br>
    </label>
    <input type=\"submit\" name=\"change\" value=\"Изменить\">
</form></div>";

    echo "<div class=\"left\"><h1>Изменения</h1>
          <p>Название товара:".$_SESSION['change']['name_product']."</p>
          <p>Описание товара:".$_SESSION['change']['product_info']."</p>
          <p>Цена товара:".$_SESSION['change']['price']."</p>
          <p>Количество товара:".$_SESSION['change']['count']."</p></div>";
}else {
    echo "<div class=\"login\"> 
            <form action=\"\" method=\"POST\">
                <label for=\"email\">Email:
                  <input class=\"inLog\" type=\"email\" name=\"email\"><br><br>
                </label>
                 <label for=\"pass\">Password:
                    <input class=\"inLog\"  type=\"pass\" name=\"pass\"><br><br>
                </label>
                <input  class=\"inLog\"  type=\"submit\" name=\"submit\" value=\"Войти\"><br>
            </form>
        </div>";
}

?>
</body>
</html>