<?php 
if(!isset($_SESSION))
	SESSION_START();

session_unset();session_destroy();
header("location:/Mo3taz/public/cpanle/");