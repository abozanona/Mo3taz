<?php 
class processAlbum
{
	//$id
	//null=>view albums
	Public $id;
	Public $search;
	Public $album;
	Public $row=[];
	public function __construct()
	{
	}

	public function process()
	{
		global $con;
		if($this->search!="")
		{
			$sql="SELECT CONCAT('/Mo3taz/public/albums/',album.albumid) AS URL, 
						 CONCAT('/Mo3taz/public/images/',album.albumid,'/',pic.url) AS SRC, 
						 album.name AS NAME, 
						 album.descr AS DESCR, 
						 album.coverpic AS COVERPIC, 
						 album.picno AS PICNO, 
						 IF(album.raters=0,0,album.rate/album.raters) AS RATE 
				  FROM album,pic 
				  WHERE pic.picid=album.coverpic 
				  AND album.hidden=0";			
		}
		elseif($this->id==null)
		{
			$sql="SELECT CONCAT('/Mo3taz/public/albums/',album.albumid) AS URL, 
						 pic.url AS SRC, 
						 album.name AS NAME, 
						 album.albumid AS ALBUMID, 
						 album.descr AS DESCR, 
						 album.coverpic AS COVERPIC, 
						 album.picno AS PICNO, 
						 IF(album.raters='0',0,album.rate/album.raters) AS RATE 
				  FROM album,pic 
				  WHERE album.hidden=0
				  AND pic.hidden=0
				  AND pic.picid=album.coverpic";
		}
		elseif($this->id==intval($this->id))
		{
			$sql="SELECT CONCAT('/Mo3taz/public/gallery/',album.albumid,'/',pic.picid) AS URL, 
						 pic.url AS SRC, 
						 album.albumid AS ALBUMID, 
						 pic.picid AS PICID 
				  FROM album,pic 
				  WHERE album.hidden=0 
				  AND pic.hidden=0 
				  AND album.albumid=".$this->id;
		}
		else
		{
			$this->row=[];
			die("");
		}
			$result=$con->query($sql);
			while($row=mysqli_fetch_array($result))
				array_push ( $this->row ,$row);
	}
	public function albumname()
	{
		global $con;
		$sql="SELECT name AS NAME FROM album WHERE albumid=".$this->id;
		$result=$con->query($sql);
		$row=mysqli_fetch_array($result);
		$this->album=$row['NAME'];
	}
}