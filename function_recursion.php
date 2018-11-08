<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="https://yt3.ggpht.com/a-/ACSszfG1sSR-E1lLu6Bb5G3B0QXdp2lH83O2dvS2ug=s900-mo-c-c0xffffffff-rj-k-no">
	<title>Керницкий ДЗ-4 php28</title>
</head>
<body>


<p>10.42. В  некоторых  языках  программирования  (например,  в  Паскале)  не  предусмотрена  операция  возведения  в  степень.  Написать  рекурсивную  функцию для расчета степени n вещественного числа a (n — натуральное число).<p>

<?php

	function rec_pow($a, $n){

		if($n <= 0){
			return $a;
		}
		
		return $a * rec_pow($a, $n-2);	

	}

echo "<hr>".rec_pow(3,3);

?>

</body>
</html>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>