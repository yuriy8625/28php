<?php

$bag = [];

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
// $bag = add($bag, 2, 10,100);
// $bag = add($bag, 3, 9,100);
// var_dump($bag);

// Удалить с корзины
	function remove($arr, $id){

		for($i = 0; $i < count($arr['items']); $i++){

			if($arr['items'][$i]['id'] == $id){
				unset($arr['items'][$i]);
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

	for($i = 0; $i < count($arr['items']); $i++){

		if($arr['items'][$i]['id'] == $id){
			$arr['items'][$i]['quantity'] = $n;
		}
	}

		// считает сумму с учетом скидки
			$arr =	discont($arr);	
		
	return $arr;
}

$bag = quantity($bag, 1, 445);
var_dump($bag);

// считает сумму с учетом скидки
	function discont($arr){

		$arr['sum'] = 0;
		$arr['total amount'] = 0;

		// считает общуюю сумму и количество
		for($i = 0; $i < count($arr['items']); $i++){
			$arr['sum'] += $arr['items'][$i]['price'];
			$arr['total amount'] += $arr['items'][$i]['quantity'];
		}

		// Выбирает какую сделать скидку
		if($arr['total amount'] < 10 && $arr['sum'] > 2000){
			 $arr['sum'] *= 0.93;
		}elseif ($arr['total amount'] > 10) {
			 $arr['sum'] *= 0.9;
		}

		return  $arr;
	}
	
?>