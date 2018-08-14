<?php

if(!isset($_GET['album']) || !isset($_GET['rate']))
	die("ff");
$album=intval($_GET['album']);
$rate=intval($_GET['rate']);

function rateC($album)
{
	if(!isset($_COOKIE['rate']))
		return -1;
	else
	{
		$ar=explode('/',rtrim($_COOKIE['rate'],'/'));
		for($i=0;$i<sizeof($ar);$i++)
			$ar[$i]=explode("-",$ar[$i]);
		for($i=0;$i<sizeof($ar);$i++)
			if($ar[$i][0]=$album)
				return $ar[$i][1];
		return -1;
	}
}
function addC($album,$rate)
{
	if(isset($_COOKIE['rate']))
		setcookie('rate',$_COOKIE['rate']."$album-$rate/");
	else
		setcookie('rate',"$album-$rate/");
}
function deleteC($album)
{
	if(!isset($_COOKIE['rate']))
		{setcookie('rate',"");return;}
	$ar=explode('/',rtrim($_COOKIE['rate'],'/'));
	for($i=0;$i<sizeof($ar);$i++)
		$ar[$i]=explode("-",$ar[$i]);
	for($i=0;$i<sizeof($ar);$i++)
	{
		if($ar[$i][0] == $album)
		{
			unset($ar[$i]);
			$ar = array_values($ar);
			break;
		}
	}
	$str="";
	for($i=0;$i<sizeof($ar);$i++)
	{
		$str.=$ar[$i][0].'-'.$ar[$i][1].'/';
	}
	setcookie('rate',$str);
}

$serverhost='localhost';
$username='root';
$password='';
$DataBase='motaz';
$queryErrorMassage="???? ???????";
$con = mysqli_connect($serverhost,$username,$password,$DataBase) or die($queryErrorMassage);
$con->query("set character set utf8") or die($queryErrorMassage);
mysqli_set_charset($con,'utf8');

if(rateC($album)!=-1)
{
	$x=rateC($album);
	deleteC($album);
	addC($album,$rate);
	$sql="UPDATE album SET rate=rate+$rate-$x,raters=raters+1 WHERE albumid=$album";
}
else 
{
	addC($album,$rate);
	$sql="UPDATE album SET rate=rate+$rate,raters=raters+1 WHERE albumid=$album";
}	
$re=$con->query($sql);