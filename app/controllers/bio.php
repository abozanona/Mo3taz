<?php
class Bio extends Controller
{
	public function index($msg='')
	{
		$this->view('header',['page'=>"bio"]);
		$this->view('pages/bio',['msg'=>$msg]);
		$this->view('footer');
	}
}