<?php
class Cpanle extends Controller
{
	public function index($page="album",$album=null)
	{
		if(!isset($_SESSION))
			SESSION_START();
		
		$this->view('header',['page'=>'album']);
		if(!isset($_SESSION['motazo']))
			{$this->view('login');return;}

		if($_SESSION['motazo']!="motazo2")
			{$this->view('login');return;}
		
		$this->view('logout');
		
		if($page!="album" and $page!="pic")
			;
		
		$x=$this->model('getadmin');
		$x->album=$album;
		$x->process();

		$this->view('cpanle/'.$page,['row'=>$x->row,'albumname'=>$x->albumname,"albumid"=>$album]);

		//$this->view('footer');
	}
}