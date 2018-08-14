<?php 
if(!isset($_SESSION))
	SESSION_START();

if($_POST['email']=="motaz@a.a" and $_POST['password']=="motaz")
	{$_SESSION['motazo']="motazo2";}

header("location:/Mo3taz/public/cpanle/");