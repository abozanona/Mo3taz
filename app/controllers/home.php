<?php
class Home extends Controller
{
	public function index($name='')
	{
		$this->view('header',['page'=>"home"]);
		
		$this->view('pages/home');
		
		$x=$this->model('processAlbum');
		$x->process();
		$this->view('homeslider',['row'=>$x->row]);
		
		$this->view('footer');
	}
}