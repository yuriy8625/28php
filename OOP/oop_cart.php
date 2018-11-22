<?php 
session_start();
?>
<!-- ДЗ:
переписываем корзину на класс.
В классе атрибуты:
items,sum,discount, count
Методы: 
конструктор, деструктор,add,delete,calc,getSum,getDiscount,getItems,setSum,setDiscount, setItems
Класс в отдельном файле. В файлах только вызовы методов класса. -->

<?php
$products = [
	2=>['name'=>'товар-1', 'price'=>233],
	7=>['name'=>'товар-2', 'price'=>333],
	43=>['name'=>'товар-3', 'price'=>332]
];

class Cart
{
	public $items; // элементы корзины
	public $sum;	// сумма элементов в корзине
	public $discount; // сумма с учетом скидки
	public $count; // количество элементов

	
	public function add($id, $quantity, $price)
	{
		$arr = $_SESSION['cart'];
		$z = 'go';
		// заполнение массива
		$arr['sum'] = 0;
		$arr['count'] = 0;

		if(empty($arr['items'])) {

			$arr['items'][] = ['id'=>$id, 'quantity'=>$quantity, 'price'=>$price*$quantity];

		} else {

			foreach ($arr['items'] as $key => $value) {
				if($value['id'] == $id){
					$z = 'stop';
					$arr['items'][$key]['quantity'] += $quantity;
					$arr['items'][$key]['price'] *= $arr['items'][$key]['quantity'];
				}
			}

		if($z == 'go') {
			$arr['items'][] = ['id'=>$id, 'quantity'=>$quantity, 'price'=>$price*$quantity];
		}		
	}
		// считает сумму и количество
		foreach($arr['items'] as $key => $value){
			$arr['sum'] += $value['price'];
			$arr['count'] += $value['quantity'];
		}

			$_SESSION['cart'] = $arr;
			
		$this->items = $arr['items'];
		$this->sum = $arr['sum'];
		$this->count = $arr['count'];
	}

	 // Удалить с корзины
	public function delete($arr, $id){
		$arr = $_SESSION['cart'];

		foreach($arr['items'] as $key => $value){

	   		if($value['id'] == $id){
	   			unset($arr['items'][$key]);
	   		}
	   	}

	   	// считает сумму и количество
		foreach($arr['items'] as $key => $value){
			$arr['sum'] += $value['price'];
			$arr['count'] += $value['quantity'];
		}
	   
		$_SESSION['cart'] = $arr;
		$this->items = $arr['items'];
		$this->sum = $arr['sum'];
		$this->count = $arr['count'];
	}	

}

?>