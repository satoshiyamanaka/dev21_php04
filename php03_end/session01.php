<?php
// sessionを開始するときに必須
session_start();
$sid = session_id();

$_SESSION['name'] = 'ふくしま';
$_SESSION['age'] = 32;
$_SESSION['love'] = 'こじまだよ';


?>