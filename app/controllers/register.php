<?php

/**
 * 
 */
class register extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registerUser()
	{
		try 
		{
			$name = $email = $password = '';

			if( ! isset($_POST['register-btn']) )
        	throw new CustomException("Ensure to use the register button");


            if( $_SERVER["REQUEST_METHOD"] != "POST" )
			throw new CustomException("Error Processing Request", 1);

			if( isset($_POST['name'] ) )
    		{
        		$name = trim( $_POST['name'] );
    		}
    		
            if( '' == $name )
				throw new CustomException("enter name");

			
			
			if( isset($_POST['email'] ) )
    		{
        		$email = trim( $_POST['email'] );
    		}
    		
            if( '' == $email )
				throw new CustomException("enter email");

			if( isset($_POST['password'] ) )
    		{
        		$password = trim( $_POST['password'] );
    		}
    		
            if( '' == $password )
				throw new CustomException("enter password");
				
			
			$user = $this->model('User');


			
			
			$user = $this->model('User');

			$user->setName($name);

			$user->setEmail($email);

			$user->setPassword($password);

			

			//$questionObject->setQuestionID($question_id);

$user->setDBInstance( $this->getDBInstance() );
			if( $user->registerUser($user) )
            {
                
                
                $success['message'] =  'User registered successfully.';

                $success['title'] =  'Success';

                $success['dashboard'] =  'Users';

                $this->response['success'] = $success;

                $this->response['error'] = false;

                echo  json_encode( $this->response );    
            }
            else
            {
                $error['message'] = 'User not registered';

                $error['title'] = 'Error';

                $this->response['success'] = false;

                $this->response['error'] = $error;

                echo  json_encode( $this->response );       
            }

		} 
		catch( CustomException $e )
		{
			$this->response['success'] = false;

            $this->response['error']['message'] = $e->getMessage();

            $this->response['error']['title'] = 'Error';

            echo json_encode( $this->response );
		}
		catch( PDOException $e )
		{
			$this->response['success'] = false;

            $this->response['error']['message'] = $e->getMessage();

            $this->response['error']['title'] = 'Error';

            echo json_encode( $this->response );
		         
		}
		catch (Exception $e) 
		{
		    $this->response['success'] = false;

            $this->response['error']['message'] = $e->getMessage();

            $this->response['error']['title'] = 'Error';

            echo json_encode( $this->response );

		}
        catch (Error $e) 
        {
            $this->response['success'] = false;

            $this->response['error']['message'] = $e->getMessage();

            $this->response['error']['title'] = 'Error';

            echo json_encode( $this->response );
        }
	}
}
?>