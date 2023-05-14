<?php 
   $fullname=$_POST['fullname'];
   $username=$_POST['username'];
   $password=$_POST['password'];
   $email=$_POST['email'];
   // Database connection
   $conn = new mysqli('localhost','root','','user');
   if($conn->connect_error){
       echo "$conn->connect_error";
       die("Connection Failed : ". $conn->connect_error);
   } else {
       $stmt = $conn->prepare("insert into users(fullname, username, password,email) values(?, ?, ?, ?)");
       $stmt->bind_param("ssss", $fullname, $username, $password,$email);
       $execval = $stmt->execute();
       echo $execval;
       echo "Registration successfully...";
       $stmt->close();
       $conn->close();
   }
?> 