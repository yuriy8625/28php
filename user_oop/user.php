<?php
session_start();
$users = [
    1=>['name'=>'Василий', 'surname'=>'Петров', 'email'=>'vasya-petya@gmail.com', 'password'=>'12345'],
    2=>['name'=>'Василий', 'surname'=>'Пупкин', 'email'=>'vasya-naibator@gmail.com', 'password'=>'123456'],
];

class User
{
    private $name;
    private $surname;
    private $email;
    private $pass;

public function __construct($users, $email, $pass)
{
	foreach ($users as $key => $value) {
		if($email == $value['email'] && $pass == $value['password']){
			$this->name = $value['name']; 
			$this->surname = $value['surname'];
			$this->email = $value['email'];
			$this->pass = $value['password'];
			$_SESSION['id'] = $key;
		}
	}
}

//    Метод проверяет пароль на правильность, и в случае если пароль правильный,
//     ложит в сессию айди залогиненого пользователя.
    // public function autendificated($pass)
    // {
    // 	if(isset($pass)){
    // 		$_SESSION['id'] = 
    // 	}
    // }
}