<?php
session_start();

$users = [
    1=>['name'=>'Василий', 'surname'=>'Петров', 'email'=>'vasya-petya@gmail.com', 'password'=>'12345', 'role'=>1],
    2=>['name'=>'Василий', 'surname'=>'Пупкин', 'email'=>'vasya-naibator@gmail.com', 'password'=>'123456', 'role'=>1],
    3=>['name'=>'admin', 'surname'=>'admin', 'email'=>'admin@gmail.com', 'password'=>'321', 'role'=>2],
    4=>['name'=>'sale', 'surname'=>'manadger', 'email'=>'sale@gmail.com', 'password'=>'123', 'role'=>3],
    5=>['name'=>'content', 'surname'=>'manadger', 'email'=>'content@gmail.com', 'password'=>'1234', 'role'=>4],
    6=>['name'=>'stock', 'surname'=>'manadger', 'email'=>'stock@gmail.com', 'password'=>'1231', 'role'=>5],
];

interface UserInterface
{
    const USER = 1; //не может редактировать ничего
    const ADMIN = 2; //Админ - может редактировать все
    const SALES_MANADGER = 3; //может редактировать цену товара
    const CONTENT_MANADGER = 4; //может редактировать только описание товара и его название
    const STOCK_MANADGER = 5; //может редактировать только количество товара на складе

    public function productEdit();
}

class User implements UserInterface
{
    private $id;
    private $pass;
    private $role;

    public function __construct($users, $email, $pass)
    {
        foreach ($users as $key => $value) {
            if ($email == $value['email'] && $pass == $value['password'] && $value['role'] == self::USER) {
                $this->pass = $value['password'];
                $this->id = $key;
                $this->role = $value['role'];
            }
        }
    }
    public function autendificated($pass)
    {
        if($pass == $this->pass){
            $_SESSION['id'] = $this->id;
            return true;
        }

        return false;
    }

    public function productEdit()
    {
        $_SESSION['role'] = $this->role;
    }
}

class Admin implements UserInterface
{
    private $id;
    private $pass;
    private $role;

    public function __construct($users, $email, $pass)
    {
        foreach ($users as $key => $value) {
            if ($email == $value['email'] && $pass == $value['password'] && $value['role'] == self::ADMIN) {
                $this->pass = $value['password'];
                $this->id = $key;
                $this->role = $value['role'];
            }
        }
    }
    public function autendificated($pass)
    {
        if($pass == $this->pass){
            $_SESSION['id'] = $this->id;
            return true;
        }

        return false;
    }

    public function productEdit()
    {
        $_SESSION['role'] = $this->role;
    }
}

class Sales_manadger implements UserInterface
{
    private $id;
    private $pass;
    private $role;

    public function __construct($users, $email, $pass)
    {
        foreach ($users as $key => $value) {
            if ($email == $value['email'] && $pass == $value['password'] && $value['role'] == self::SALES_MANADGER) {
                $this->pass = $value['password'];
                $this->id = $key;
                $this->role = $value['role'];
            }
        }
    }
    public function autendificated($pass)
    {
        if($pass == $this->pass){
            $_SESSION['id'] = $this->id;
            return true;
        }

        return false;
    }

    public function productEdit()
    {
        $_SESSION['role'] = $this->role;
    }
}

class Content_manadger implements UserInterface
{
    private $id;
    private $pass;
    private $role;

    public function __construct($users, $email, $pass)
    {
        foreach ($users as $key => $value) {
            if ($email == $value['email'] && $pass == $value['password'] && $value['role'] == self::CONTENT_MANADGER) {
                $this->pass = $value['password'];
                $this->id = $key;
                $this->role = $value['role'];
            }
        }
    }
    public function autendificated($pass)
    {
        if($pass == $this->pass){
            $_SESSION['id'] = $this->id;
            return true;
        }

        return false;
    }

    public function productEdit()
    {
        $_SESSION['role'] = $this->role;
    }
}
class Stock_manadger implements UserInterface
{
    private $id;
    private $pass;
    private $role;

    public function __construct($users, $email, $pass)
    {
        foreach ($users as $key => $value) {
            if ($email == $value['email'] && $pass == $value['password'] && $value['role'] == self::STOCK_MANADGER) {
                $this->pass = $value['password'];
                $this->id = $key;
                $this->role = $value['role'];
            }
        }
    }
    public function autendificated($pass)
    {
        if($pass == $this->pass){
            $_SESSION['id'] = $this->id;
            return true;
        }

        return false;
    }

    public function productEdit()
    {
        $_SESSION['role'] = $this->role;
    }
}
?>
