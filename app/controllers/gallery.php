<?php
class gallery extends Controller
{
	public function index($album=null,$id=1)
	{
		$this->view('header',['page'=>"??",'gslider'=>'??']);

		$x=$this->model('getgallerypic');
		$x->album=$album;
		$x->id=$id;
		$x->process();
		$this->view('pages/gallery',['row'=>$x->row,'n'=>$x->n, 'album'=>$album, 'pic'=>$id, 'rate'=>$x->rate, 'albumdate'=>$x->albumdate]);
		//$this->view('footer');
	}
}