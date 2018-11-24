<?php
session_start();
include "oop_cart.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>list.php</title>
</head>
<body>

<a href="index.php">index.php</a>
<table border="1" cellspacing="0">
	<tr>
		<th>Товар</th>
		<th>Количество</th>
		<th>Цена</th>
		<th>Сумма</th>
		<th>Удалить</th>
	</tr>
	<?php
	$cart = new Cart();
if(!empty($cart->getItems())){
	foreach ($cart->getItems() as $key => $value) {
		echo "<tr style=\"text-align: center\">
		<td>".$products[$value['id']]['name']."</td>
		<td>".$value['quantity']."</td>
		<td>".$products[$value['id']]['price']."</td>
		<td>".$value['price']."</td><td><a href='/delete.php?id=".$value['id']."'>Х</a></td>
		</tr>";
	}
}else {
	echo "<br><b style=\"color:red;\">Корзина пустая</b>";
}
?>	
</table>
<?php
echo "<p>Общее количество: ".$cart->getCount()."</p>";


	if($cart->getDiscount() > 0){
		echo "<p>К оплате с учетом скидки: ".$cart->getDiscount()."</p>";
	}else {
		echo "<p>К оплате: ".$cart->getSum()."</p>";
	}

?>
	
</body>
</html>