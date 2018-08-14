<?php 
class getadmin
{
	Public $album;
	Public $albumname;
	Public $row=[];
	public function __construct()
	{
	}

	public function process()
	{
		global $con;
		if($this->album==null)
			$sql="SELECT albumid, name, date, descr, hidden, coverpic, picno, rate, raters, date FROM album WHERE 1";
		else
		{
			$sql="SELECT name FROM album WHERE albumid=".$this->album;
			$result=$con->query($sql);
			$row=mysqli_fetch_array($result);
			$this->albumname=$row['name'];
			/////////////////////////////////////////////////////////////////////////
			$sql="SELECT picid AS ID,
						 url AS SRC, 
						 hidden AS HIDDEN
				  FROM pic 
				  WHERE albumid=".$this->album;
		}
		$result=$con->query($sql);
		while($row=mysqli_fetch_array($result))
			array_push ( $this->row ,$row);
		
	}
}