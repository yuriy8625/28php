<?php
session_start();
$users = [
    1=>['name'=>'Василий', 'surname'=>'Петров', 'email'=>'vasya-petya@gmail.com', 'password'=>'12345'],
    2=>['name'=>'Василий', 'surname'=>'Пупкин', 'email'=>'vasya-naibator@gmail.com', 'password'=>'123456'],
];

class User
{
	private $id;
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
				$this->id = $key;
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

    public function getPass()
    {
    	return $this->pass;
    }
}
