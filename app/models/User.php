<?php

/**
 * 
 */
class User extends Person
{

	public function loadProfile()   
    {
        try
        {
            $sql = 'SELECT * FROM users WHERE email = :email';

            $stmt = $this->dbInstance->prepare( $sql );

            $stmt->execute( array(':email'=>$this->email ) );
//var_dump($this->email);
            $row = $stmt->fetch( PDO::FETCH_ASSOC );

            $this->name = $row['name'];
            
            $this->email = $row['email'];
            //$this->gender = $row['gender'];
            $this->sessionID = $row['session_id'];
            //$this->dob = $row['dob'];

        }
        catch( PDOException $e )
        {
            throw new PDOException( $e->getMessage() );
        }
    }
	
	public function registerUser(User $user)
    {
        try
        {   
            
            $user->setDBInstance($this->dbInstance);
            
            $psw = password_hash($user->getPassWord(), PASSWORD_DEFAULT);
            $sessionID = Parent::generateRandomNumber(9);
                //$studentID = Parent::generateRandomNumber(5);
                //$student->setID($studentID);

                
            
                $sql = "INSERT INTO users SET name = :name, 
                                                email = :email, 
                                                password = :psw,
                                                session_id = :sessionID";

                $stmt = $this->dbInstance->prepare($sql);
                $stmt->execute(array(
                                    ':name'=>$user->getName(),
                                    ':email'=>$user->getEmail(),
                                    ':psw'=>$psw,
                                    ':sessionID'=>$sessionID
                ));
            
                return ( $stmt->rowCount() >0 );

        } 
        catch(CustomException $e )
        {
            throw new CustomException("Error: ". $e->getMessage() );   
        }
        catch ( PDOException $e )
        {
            throw new PDOException ( $e->getMessage() );
        }
        catch(Exception $e)
        {
            throw new Exception("Error: ". $e->getMessage() );   
        }
        catch(Error $e)
        {
            throw new Error( $e->getMessage() );
        }
    }
}
?>