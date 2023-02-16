<?php
 /**
  * 
  */
 class Users extends Controller
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
 	}
 	public function default()
	{
		try
		{
			if( ! isset( $_SESSION['userID'] ) || ! isset( $_SESSION['sessionID'] ) )
			{
				$this->view('login/user');
				return;
			}

			$user = $this->model('User');

			//$user->setID( $_SESSION['userID'] );


			$user->setDBInstance( $this->getDBInstance() );

			$user->setEmail( $_SESSION['userID'] );

			$user->loadProfile();

			if( $user->getSessionID() != $_SESSION['sessionID'] )
			{
				$this->view('login/user');
				return;
			}

			$this->view( 'User/dashboard', ['user'=>$user] );
		}
		catch( PDOException $e )
		{
			echo $e->getMessage();
		}
		catch( CustomException $e )
		{
			echo $e->getMessage();
		}
		catch( Exception $e )
		{
			echo $e->getMessage();
		}
		catch( Error $e )
		{
			echo $e->getMessage();
		}
	}

	public function about()
	{
		$this->view('User/about');
	}

	public function contact()
	{
		$this->view('User/contact');
	}

	public function service()
	{
		$this->view('User/service');
	}

	public function why()
	{
		$this->view('User/why');
	}
 }
?>