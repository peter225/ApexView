<?php
 /**
  * 
  */
 class signup extends Controller
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
 	}
 	public function default()
	{
		$this->view('register/user');
	}
 }
?>