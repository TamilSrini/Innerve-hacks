<?php      
    include('connection.php');  
    $mail = $_POST['mail'];  
    $pass = $_POST['pass'];  
    
        //to prevent from mysqli injection  
        $username = stripcslashes($mail);  
        $password = stripcslashes($pass);  
        $username = mysqli_real_escape_string($con, $mail);  
        $password = mysqli_real_escape_string($con, $pass);  
      
        $sql = "select * from register where mail = '$mail' and pass= '$pass'";  
        $result = mysqli_query($con, $sql); 
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 0){  
            echo "<h1><center> Login successful </center></h1>"; 
            header('Location: index.html');
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  