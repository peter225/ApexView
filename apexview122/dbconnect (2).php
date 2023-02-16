<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
 
        // servername => localhost
        // username => apexdkwy_apexview
        // password => danielchris
        // database name => apexdkwy_database
        $conn = mysqli_connect("localhost", "apexdkwy_apexview", "danielchris", "apexdkwy_database");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 3 values from the form data(input)
        $firstName =  $_REQUEST['firstname'];
        $email =  $_REQUEST['email'];
        $password = $_REQUEST['password'];
       
         
        // Performing insert query execution
        // here our table name is dbreg
        $sql = "INSERT INTO dbreg VALUES ('$name',
            '$email','$password')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>Successfully Registered</h3>";
 
            echo nl2br("$firstname $email ");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>