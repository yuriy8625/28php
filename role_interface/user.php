<?php
session_start();

$users = [
    1=>['name'=>'Василий', 'surname'=>'Петров', 'email'=>'vasya-petya@gmail.com', 'password'=>'12345', 'role'=>'User'],
    2=>['name'=>'Василий', 'surname'=>'Пупкин', 'email'=>'vasya-naibator@gmail.com', 'password'=>'123456', 'role'=>'User'],
    3=>['name'=>'admin', 'surname'=>'admin', 'email'=>'admin@gmail.com', 'password'=>'321', 'role'=>'Admin'],
    4=>['name'=>'sale', 'surname'=>'manadger', 'email'=>'sale@gmail.com', 'password'=>'123', 'role'=>'Sales_manadger'],
    5=>['name'=>'content', 'surname'=>'manadger', 'email'=>'content@gmail.com', 'password'=>'1234', 'role'=>'Content_manadger'],
    6=>['name'=>'stock', 'surname'=>'manadger', 'email'=>'stock@gmail.com', 'password'=>'1231', 'role'=>'Stock_manadger'],
];

interface UserInterface
{
    const USER = 'User'; //не может редактировать ничего
    const ADMIN = 'Admin'; //Админ - может редактировать все
    const SALES_MANADGER = 'Sales_manadger'; //может редактировать цену товара
    const CONTENT_MANADGER = 'Content_manadger'; //может редактировать только описание товара и его название
    const STOCK_MANADGER = 'Stock_manadger'; //может редактировать только количество товара на складе

    public function productEdit($role);
}

class User implements UserInterface
{
    private $id;
    private $pass;

    public function __construct($id, $pass)
    {
        $this->id = $id;
        $this->pass = $pass;
    }
    public function autendificated($pass)
    {
        if($pass == $this->pass){
            $_SESSION['id'] = $this->id;
            return true;
        }

        return false;
    }

    public function productEdit($role)
    {   
       if($role == self::USER) {
        echo "<center><h1>Вы имеете ограниченые возможности</h1></center>";
        }
    }
}

class Admin extends User 
{
    public function productEdit($role)
    {
       if($role == self::ADMIN){
            $_SESSION['change'] = [
                'product_info'=>$_POST['product_info'],
                'name_product'=>$_POST['name_product'],
                'price' => $_POST['price'],
                'count'=>$_POST['count'],
            ];
       }
       return $_SESSION['change'];
    }
}

class Sales_manadger extends User
{
    
    public function productEdit($role)
    {
        if($role == self::SALES_MANADGER && empty($_POST['product_info']) && empty($_POST['name_product']) && empty($_POST['count'])){
            $_SESSION['change'] = ['price' => $_POST['price']];
        }else {
            echo "<center><h1>Вы не имеете полномочий на данную операцию</h1></center>";
        }
    }
}

class Content_manadger extends User
{
    
    public function productEdit($role)
    {
        if($role == self::CONTENT_MANADGER && empty($_POST['price']) && empty($_POST['count'])){
            $_SESSION['change'] = ['product_info'=>$_POST['product_info'], 'name_product'=>$_POST['name_product']];
        }else {
            echo "<center><h1>Вы не имеете полномочий на данную операцию</h1></center>";
        }
    }
}
class Stock_manadger extends User
{
    
    public function productEdit($role)
    {
        if($role == self::STOCK_MANADGER  && empty($_POST['product_info']) && empty($_POST['name_product']) && empty($_POST['price'])){
            $_SESSION['change'] = ['count'=>$_POST['count']];
        }else {
            echo "<center><h1>Вы не имеете полномочий на данную операцию</h1></center>";
        }
    }
}
?>

