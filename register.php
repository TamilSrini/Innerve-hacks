<?php

$fname = $_POST['fname'];
$lname  = $_POST['lname'];
$mail = $_POST['mail'];
$pass= $_POST['pass'];
$dob = $_POST['dob'];
$bg  = $_POST['bg'];
$address = $_POST['address'];
$pin= $_POST['pin'];
$c1 = $_POST['c1'];
$c2  = $_POST['c2'];
$c3 = $_POST['c3'];
$c4= $_POST['c4'];



if (!empty($fname) || !empty($lname) || !empty($mail) || !empty($pass) || !empty($dob)||!empty($bg)||!empty($address)||!empty($pin)||!empty($c1)||!empty($c2)||!empty($c3)||!empty($c4))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT mail From register Where mail = ? Limit 1";
  $INSERT = "INSERT Into register (fname,lname,mail,pass,dob,bg,address,pin,c1,c2,c3,c4)values(?,?,?,?,?,?,?,?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssssiiiii", $fname,$lname,$mail, $pass, $dob ,$bg , $address , $pin, $c1,  $c2 , $c3 ,  $c4 );
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>