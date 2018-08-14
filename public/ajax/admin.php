<?php
$serverhost='localhost';
$username='root';
$password='';
$DataBase='motaz';
$queryErrorMassage="???? ???????";
$con = mysqli_connect($serverhost,$username,$password,$DataBase) or die($queryErrorMassage);
$con->query("set character set utf8") or die($queryErrorMassage);
mysqli_set_charset($con,'utf8');

$fun=$_GET['function'];

if($fun=='deletealbum')
{
	$album=$_GET['album'];
	$sql="DELETE FROM `album` WHERE albumid=$album";
	$r=$con->query($sql);
}
elseif($fun=='deletepic')
{
	$pic=$_GET['pic'];
	$album=$_GET['album'];
	$sql="DELETE FROM pic WHERE picid=$pic AND albumid=$album";
	$r=$con->query($sql);
}
elseif($fun=='hide-showalbum')
{
	$album=$_GET['album'];
	$sql="UPDATE album SET hidden=ABS(1-hidden) WHERE albumid=$album";
	$r=$con->query($sql);
}
elseif($fun=='hide-showpic')
{
	$pic=$_GET['pic'];
	$album=$_GET['album'];
	$sql="UPDATE pic SET hidden=ABS(1-hidden) WHERE albumid=$album AND picid=$pic";
	$r=$con->query($sql);
}
elseif($fun=='changealbum')
{
	$album=$_GET['album'];
	$name=$_GET['name'];
	$date=$_GET['date'];
	$descr=$_GET['descr'];
	$sql="UPDATE album SET name='$name',descr='$descr',date='$date' WHERE albumid=$album";
	$r=$con->query($sql);
	echo $sql;
	
}
elseif($fun=='addalbum')
{
	$sql="INSERT INTO `album`(`name`, `descr`) VALUES ('البوم جديد','شرح عنو')";
	$r=$con->query($sql);
}
elseif($fun=='addpic')
{
	$albumid=$_GET['album'];
	$url=$_GET['url'];
	$sql="INSERT INTO `pic`(`albumid`, `url`) VALUES ($albumid,'$url')";
	$r=$con->query($sql);
}
