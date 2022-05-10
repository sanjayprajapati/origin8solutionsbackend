<?php

   
    require('../../db.php');


  
        $email          =$_POST['email'];
        $password           = $_POST['password'];
        //$email          = mysqli_real_escape_string($con,$_POST['email']);
        $checkTokenRes  = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '" . md5($password) . "'");

        //email authentication      
        echo json_encode(["email"=>$email, "password"=>$password])




 


?>
