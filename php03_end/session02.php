<?php
// sessionを開始するときに必須 session02.phpで、session01.phpで作った変数を使用できる！
session_start();

var_dump($_SESSION);

?>