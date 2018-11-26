<?php
 $url = 'https://www.google.com/recaptcha/api/siteverify'; //url для запроса

 $key = '6LfaH30UAAAAAOiOqdNF1PJBLP4tIkEq-am161ML'; // секретный ключ

 $query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']; // сам запрос

 $data = json_decode(file_get_contents($query)); // возвращаем запрос
?>