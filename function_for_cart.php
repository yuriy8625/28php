<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<form method="POST">
	id <input type="text" name="id"><br><br>
	quantity <input type="number" name="quantity"><br><br>
	price <input type="number" name="price"><br><br>
	<input type="submit" name="submit">
</form>

<?php

// Добавить в корзину
	function add($arr, $id, $quantity, $price){
		
		// заполнение массива
		$arr['sum'] = 0;
		$arr['total amount'] = 0;

		$arr['items'][] = ['id'=>$id, 'quantity'=>$quantity, 'price'=>$price];

		// считает сумму с учетом скидки
			$arr =	discont($arr);	
	
		return $arr;
	}
	
// $bag = add($bag, 1, 10,100);
// var_dump($bag);

	// Удалить с корзины
	function remove($arr, $id){

		foreach($arr['items'] as $key => $value){

	   		if($value['id'] == $id){
	   			unset($arr['items'][$key]);
	   		}
	   	}
	   	
		// считает сумму с учетом скидки
			$arr = discont($arr);	
		
		return $arr;
	}
// $bag = remove($bag, 2);
// var_dump($bag);

// Изменить количество
	function quantity($arr, $id, $n){

		foreach ($arr['items'] as $key => $value) {
		
			if($value['id'] == $id){
				$arr['items'][$key]['quantity'] = $n;
				$arr['items'][$key]['price'] *= $n;
			}
		}

		// считает сумму с учетом скидки
		$arr =	discont($arr);	
		
		return $arr;
	}
// $bag = quantity($bag,1, 44);
// var_dump($bag);

// считает сумму с учетом скидки
	function discont($arr){

		$arr['sum'] = 0;
		$arr['total amount'] = 0;

		// считает общуюю сумму и количество
		foreach($arr['items'] as $key => $value){
			$arr['sum'] += $value['price'];
			$arr['total amount'] += $value['quantity'];
		}

		// Выбирает какую сделать скидку
		if($arr['total amount'] < 10 && $arr['sum'] > 2000){
			 $arr['sum'] *= 0.93;
		}elseif ($arr['total amount'] > 10) {
			 $arr['sum'] *= 0.9;
		}

		return  $arr;
	}

$cart = $_SESSION['cart'];

	if(!empty($_POST['id']) && !empty($_POST['quantity']) && !empty($_POST['price'])) {

		// $bag = add($bag, $_POST['id'], $_POST['quantity'],$_POST['price']);

		// $bag = remove($bag, $_POST['id']);
	}


 $_SESSION['cart'] = $cart;
var_dump($cart);

?>
