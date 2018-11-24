<?php 
session_start();

$products = [
	2=>['name'=>'товар-1', 'price'=>233],
	7=>['name'=>'товар-2', 'price'=>333],
	43=>['name'=>'товар-3', 'price'=>332]
];

class Cart
{
	public $cart;
	private $items; // элементы корзины
	private $sum;	// сумма элементов в корзине
	private $discount; // сумма с учетом скидки
	private $count; // количество элементов

	public function __construct()
	{
		$this->cart = $_SESSION['cart'];

		$this->setItems();
		$this->setSum();
		$this->setCount();
		$this->setDiscount();
	}	
	
	public function add($id, $quantity, $price)
	{
		$arr = $_SESSION['cart'];
		$z = 'go';
		
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
		
 		$arr = $this->calc($arr);
		
		$_SESSION['cart'] = $arr;
		
		$this->items = $arr['items'];
		$this->sum = $arr['sum'];
		$this->count = $arr['count'];
		$this->discount = $arr['discount'];

	}

	 // Удалить с корзины
	public function delete($id)
	{
		$arr = $_SESSION['cart'];

		foreach($arr['items'] as $key => $value){

	   		if($value['id'] == $id){
	   			unset($arr['items'][$key]);
	   		}
	   	}

	    $arr = $this->calc($arr);
	   
		$_SESSION['cart'] = $arr;
		
		$this->items = $arr['items'];
		$this->sum = $arr['sum'];
		$this->count = $arr['count'];
		$this->discount = $arr['discount'];
	}

	public function calc($arr)
	{
		$arr['sum'] = 0;
		$arr['count'] = 0;
		$arr['discount'] = 0;

		// считает сумму и количество
		foreach($arr['items'] as $key => $value){
			$arr['sum'] += $value['price'];
			$arr['count'] += $value['quantity'];
		}

		// Выбирает какую сделать скидку
		if($arr['count'] < 10 && $arr['sum'] > 2000){
			 $arr['discount'] = $arr['sum'] * 0.93;
		}elseif ($arr['count'] > 10) {
			 $arr['discount'] = $arr['sum'] *  0.9;
		}

		return $arr;
	}	

	public function setItems()
	{
		$this->items = $this->cart['items'];
	}

	public function setSum()
	{
		$this->sum = $this->cart['sum'];
	}

	public function setDiscount()
	{
		$this->discount = $this->cart['discount'];
	}


	public function setCount()
	{
		$this->count = $this->cart['count'];
	}

	public function getItems()
	{
		return $this->items ;
	}

	public function getSum()
	{
		return $this->sum;
	}

	public function getDiscount()
	{
		return $this->discount;
	}

	public function getCount()
	{
		return $this->count;
	}
	
}

?>