<?php 
class getgallerypic
{
	Public $id;
	Public $n;
	Public $album;
	Public $albumdate;
	Public $rate;
	Public $row=[];
	public function __construct()
	{
	}

	private function rateC($album)
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

	public function process()
	{
		global $con;
		$sql="SELECT pic.picid AS ID,
					 pic.url AS SRC 
			  FROM album,pic 
			  WHERE album.hidden=0 
			  AND pic.hidden=0 
			  AND album.albumid=".$this->album;
		$result=$con->query($sql);
		$i=0;
		$this->n=-5;
		while($row=mysqli_fetch_array($result))
		{
			array_push ( $this->row ,$row);
			if($row['ID']==$this->id)
				$this->n=$i;
			$i++;
		}

		if($this->rateC($this->album)!=-1)
			$this->rate=rateC($album);
		else{
			$sql="SELECT rate, raters,date FROM album WHERE albumid=".$this->album;
			$result=$con->query($sql);
			$row=mysqli_fetch_array($result);
			$this->rate=($row['raters']=='0')?0:
											intval($row['rate'])/intval($row['raters']);
			$this->albumdate=$row['date'];
		}
	}	
}