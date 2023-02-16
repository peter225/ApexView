<?php

class Home extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function default()
	{
		$this->view('Home/index');
		
	}

	

}