<?php
class Search extends Controller
{
	public function index($text='')
	{
		$this->view('header',['search'=>$text,'page'=>'album']);

		$x=$this->model('processAlbum');
		$x->search=$text;
		$x->process();

		$this->view('pages/albums',['search'=>$text,'id'=>null,'row'=>$x->row]);
		$this->view('footer');
	}
}