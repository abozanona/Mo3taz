<?php
class Albums extends Controller
{
	public function index($id=null)
	{
		$x=$this->model('processAlbum');
		$x->id=$id;
		$x->process();
		if($id!=null)
			$x->albumname();
		$this->view('header',['page'=>"album"]);
		$this->view('pages/albums',['id'=>$x->id, 'row'=>$x->row,'album'=>$x->album ]);
		$this->view('footer');
	}
}