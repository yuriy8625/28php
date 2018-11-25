<?php 
session_start();

$products = [
	2=>['name'=>'товар-1', 'price'=>233],
	7=>['name'=>'товар-2', 'price'=>333],
	43=>['name'=>'товар-3', 'price'=>332]
];

class Cart
{	
	private $items; // элементы корзины
	private $sum;	// сумма элементов в корзине
	private $discount; // сумма с учетом скидки
	private $count; // количество элементов

	public function __construct()
	{
		$this->items = $_SESSION['items'];
		$this->sum = $_SESSION['sum'];
		$this->count = $_SESSION['count'];
		$this->discount = $_SESSION['discount'];
	}

	public function __destruct()
    {
       $_SESSION['items'] = $this->items;
       $_SESSION['sum'] = $this->sum;
       $_SESSION['count'] = $this->count;
       $_SESSION['discount'] = $this->discount;
    }

    public function add($id, $quantity, $price)
	{
		if(isset($this->items[$id])) {
			$this->items[$id]['quantity'] += $quantity;
			$this->items[$id]['price'] *= $this->items[$id]['quantity'];
		} elseif($id > 0 && $quantity >0) {
			$this->items[$id] = ['quantity'=>$quantity, 'price'=>$price*$quantity];
		}
		$this->calc($this->items);
	}

	 // Удалить с корзины
	public function delete($id)
	{
		foreach($this->items as $key => $value){

	   		if($key == $id){
	   			unset($this->items[$key]);
	   		}
	   	}

	    $this->calc($this->items);
	}

	// Пересчет суммы кол-ва и скидки
	public function calc($arr)
	{
		$discount = 0;

		// считает сумму и количество
		foreach($arr as $value){
			$sum += $value['price'];
			$count += $value['quantity'];
		}

		// Выбирает какую сделать скидку
		if($count < 10 && $sum > 2000){
			 $discount = $sum * 0.93;
		}elseif ($count > 10) {
			 $discount = $sum *  0.9;
		}

       $this->setSum($sum);
       $this->setCount($count);
       $this->setDiscount($discount);
	}	

	public function setSum($sum)
	{
		$this->sum = $sum;
	}

	public function setDiscount($discount)
	{
		$this->discount = $discount;
	}

	
	public function setCount($count)
	{
		$this->count = $count;
	}

	public function getItems()
	{
		return $this->items;
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