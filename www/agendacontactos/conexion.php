<?php
//conexion base datos

$bd = mysqli_connect("db", "root", "test"); 
mysqli_set_charset($bd, "utf8");// 
mysqli_select_db($bd, "agenda");//
//$bd = mysqli_connect('db', 'root', 'test', "agenda");
?>


