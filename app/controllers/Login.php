<?php
/**
 * 
 */
class Login extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
    public function default()
    {
        $this->view('Login/user');
    }
	
	public function loginUser()
	{
		try 
		{
			$email = $password = "";

			if(! isset($_POST['login-btn']))
			{
				throw new CustomException("Ensure to use the login button");
			}
			if( $_SERVER["REQUEST_METHOD"] != "POST" )
        		throw new CustomException("Error Processing Request", 1);
        
    		if(isset($_POST['email']))
    		{
        		$email = trim( $_POST['email'] );
    		}

    		if(isset($_POST['password']))
    		{
        		$password = trim( $_POST['password'] );
    		}
            
    		if( "" == $email || "" == $password )
        		throw new CustomException("Enter your username and/or passsword");

            


            $user = null;
            

    		  $user = $this->model('User');

            

            if( null == $user )
                throw new CustomException("Unkown role detected");

            //$passwordHash = password_hash( $psw, PASSWORD_DEFAULT );
            //var_dump( $passwordHash );
//throw new CustomException($passwordHash);
            $user->setDBInstance( $this->getDBInstance() );

            $user->setEmail( $email );

            if( ! $user->verifyPassword ( $password) )
                throw new CustomException( "Unkown user" );
        	
        	$_SESSION['sessionID'] = Person::generateRandomNumber( 9 );
            //var_dump($_SESSION['sessionID']);
        	$user->setSessionID( $_SESSION['sessionID'] );

            
            $_SESSION['userID'] = $user->getEmail();

            $this->response['dashboard'] = 'Users';
            
            
        	$this->response['success'] = 'OK';

        	$this->response['error'] = false;

       		echo  json_encode( $this->response );
		}
		catch( CustomException $e )
		{
			$this->response['success'] = false;

            $this->response['error'] = $e->getMessage();

            echo json_encode( $this->response );
		}
		catch( PDOException $e )
		{
			$this->response['success'] = false;

            $this->response['error'] = $e->getMessage();

            echo json_encode( $this->response );
		         
		}
		catch (Exception $e) 
		{
		    $this->response['success'] = false;

            $this->response['error'] = $e->getMessage();

            echo json_encode( $this->response );
		}
        catch (Error $e) 
        {
            $this->response['success'] = false;

            $this->response['error'] = $e->getMessage();

            echo json_encode( $this->response );
        }
    }
}
?>