<?php
session_start();
?>

<?php
$cart = [];

// Добавить в корзину
	function add($arr, $id, $quantity, $price){
		$arr = $_SESSION['cart'];

		// заполнение массива
		$arr['sum'] = 0;
		$arr['total amount'] = 0;

		$arr['items'][] = ['id'=>$id, 'quantity'=>$quantity, 'price'=>$price*$quantity];

		// считает сумму с учетом скидки
			$arr =	discont($arr);	

			$_SESSION['cart'] = $arr;
		return $arr;
	}	

	// Удалить с корзины
	function remove($arr, $id){
		$arr = $_SESSION['cart'];
		foreach($arr['items'] as $key => $value){

	   		if($value['id'] == $id){
	   			unset($arr['items'][$key]);
	   		}
	   	}
	   	
		// считает сумму с учетом скидки
			$arr = discont($arr);
		$_SESSION['cart'] = $arr;
		return $arr;
	}

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

?>