<?php
$bag = [];



// Добавить в корзину
	function add($arr, $id, $quantity, $price){
		
		// заполнение массива
		$arr['sum'] = 0;
		$arr['total amount'] = 0;

		$arr['items'][] = ['id'=>$id, 'quantity'=>$quantity, 'price'=>$price];
		
			
		// считает общуюю сумму и количество
		for($i = 0; $i < count($arr['items']); $i++){
			$arr['sum'] += $arr['items'][$i]['price'];
			$arr['total amount'] += $arr['items'][$i]['quantity'];
		}

		// считает сумму с учетом скидки
		if($arr['total amount'] < 10 && $arr['sum'] > 2000){
			$arr['sum'] *= 0.93;
		}elseif ($quantity > 10) {
			$arr['sum'] *= 0.9;
		}				
	
		return $arr;
	}
	
// $bag = add($bag, 1, 1,1);
// $bag = add($bag, 2, 1,1);
// $bag = add($bag, 3, 1,1);
// var_dump($bag);

// Удалить с корзины
	function remove($arr, $id){

		for($i = 0; $i < count($arr['items']); $i++){
			if($arr['items'][$i]['id'] == $id){
				unset($arr['items'][$i]);
			}
		}
		return $arr;
	}
// $bag = remove($bag,2);
// var_dump($bag);

// Изменить количество
function quantity($arr, $id, $n){

	for($i = 0; $i < count($arr['items']); $i++){

		if($arr['items'][$i]['id'] == $id){
			$arr['items'][$i]['quantity'] = $n;
		}
	}
	return $arr;
}

// $bag = quantity($bag,1, 44599084);
// var_dump($bag);

// считает сумму с учетом скидки
	function discont($sum,$quantity){

		if($quantity < 10 && $sum > 2000){
			$sum *= 0.93;
		}elseif ($quantity > 10) {
			$sum *= 0.9;
		}

		return $sum;
	}
?>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>