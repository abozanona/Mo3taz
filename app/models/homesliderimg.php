<?php 
class homesliderimg
{
	Public $row=[];
	public function __construct()
	{
	}

	public function process()
	{
		global $con;
		$sql="SELECT CONCAT('/Mo3taz/public/albums/',album.albumid) AS URL, 
					 CONCAT('/Mo3taz/public/images/',album.albumid,'/',pic.url) AS SRC, 
					 album.name AS NAME, 
					 album.descr AS DESCR, 
					 album.coverpic AS COVERPIC 
			  FROM album,pic 
			  WHERE album.hidden=0 
			  AND pic.picid=album.coverpic 
			  LIMIT 5";
		$result=$con->query($sql);
		while($row=mysqli_fetch_array($result))
			array_push ( $this->row ,$row);
	}
}