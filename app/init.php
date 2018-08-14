<?php
 ini_set('default_charset','UTF-8');
$serverhost='localhost';
$username='root';
$password='';
$DataBase='motaz';
$queryErrorMassage="حاول مجددا؟؟";
$con = mysqli_connect($serverhost,$username,$password,$DataBase) or die($queryErrorMassage);
$con->query("set character set utf8") or die($queryErrorMassage);
mysqli_set_charset($con,'utf8');


require_once 'core/App.php';
require_once 'core/controller.php';
