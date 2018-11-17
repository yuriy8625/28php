<?php
session_start();
include "cart.php";
$list = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>list.php</title>
</head>
<body>

<a href="add.php">add.php</a>
<table border="1" cellspacing="0">
	<tr>
		<th>Товар</th>
		<th>Количество</th>
		<th>Сумма</th>
		<th>Удалить</th>
	</tr>
	<?php
	foreach ($list['items'] as $key => $value) {
		echo "<tr style=\"text-align: center\"><td>".$products[$value['id']]['name']."</td><td>".$value['quantity']."</td><td>".$value['price']."</td><td><a href='/delete.php?id=".$value['id']."'>Х</a></td></tr>";
	}

?>	
</table>
<?php
echo "<p>К оплате с учетом скидки: ".$list['sum']."</p>";
?>
	
</body>
</html>