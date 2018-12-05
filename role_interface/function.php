<?php
session_start();
if(isset($_POST['change'])) {
    //Для пользователя
    if ($_SESSION['role'] == 1) {
        echo "<center><h1>Вы имеете ограниченые возможности</h1></center>";
    }
    //Админ
    elseif ($_SESSION['role'] == 2){
        $_SESSION['change'] = [
            'product_info'=>$_POST['product_info'],
            'name_product'=>$_POST['name_product'],
            'price' => $_POST['price'],
            'count'=>$_POST['count'],
        ];
    }
    //Менеджер продаж
    elseif  ($_SESSION['role'] == 3 && empty($_POST['product_info']) && empty($_POST['name_product']) && empty($_POST['count'])){
        $_SESSION['change'] = ['price' => $_POST['price']];
    }
    //Контент менеджер
    elseif ($_SESSION['role'] == 4 && empty($_POST['price']) && empty($_POST['count'])){
        $_SESSION['change'] = ['product_info'=>$_POST['product_info'], 'name_product'=>$_POST['name_product']];
    }
    //Менеджер склада
    elseif ($_SESSION['role'] == 5  && empty($_POST['product_info']) && empty($_POST['name_product']) && empty($_POST['price'])){
        $_SESSION['change'] = ['count'=>$_POST['count']];
    } else {
        echo "<center><h1>Вы не имеете полномочий на данную операцию</h1></center>";
    }
}
?>
