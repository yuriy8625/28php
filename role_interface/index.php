<?php
session_start();
require_once "user.php";
// require "function.php";
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
        if($_POST['pass'] == $value['password']  && $value['role'] == 'User' && $_POST['email'] == $value['email']){
            $user = new User($key, $value['password']);           
        }
        if($_POST['pass'] == $value['password'] && $value['role'] == 'Admin' && $_POST['email'] == $value['email']){
            $user = new Admin($key, $value['password']);       
        }
        if($_POST['pass'] == $value['password']  && $value['role'] == 'Sales_manadger' && $_POST['email'] == $value['email']){
            $user = new Sales_manadger($key, $value['password']);          
        }
        if($_POST['pass'] == $value['password']  && $value['role'] == 'Content_manadger' && $_POST['email'] == $value['email']){
            $user = new Content_manadger($key, $value['password']);           
        }
        if($_POST['pass'] == $value['password']  && $value['role'] == 'Stock_manadger' && $_POST['email'] == $value['email']){
            $user = new Stock_manadger($key, $value['password']);
        }
    }
    if(isset($user)){
         $user->autendificated($_POST['pass']);
     } else echo "Unknow login or password";
   
}

// Вывод
if(isset($_SESSION['id'])){

    $user = $users[$_SESSION['id']];
    $class = $user['role'];
    $userObject = new $class($_SESSION['id'],$user['password']);

    if(isset($_POST['change'])){
        $userObject->productEdit($class);
    }

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