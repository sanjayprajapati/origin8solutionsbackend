<?php
    
    // Importing DBConfig.php file.
    require('db.php');
    

    // Getting the received JSON into $json variable.
    $json = file_get_contents('php://input');    
    // decoding the received JSON and store into $obj variable.
    $obj        = json_decode($json,true);    
    $email      = $obj['email'];    
    $password   = $obj['password'];

    //Checking Email is already exist or not using SQL query.
    $CheckSQL = "SELECT * FROM users WHERE email='$email'";
    
    // Executing SQL Query.
    $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
    
    
    if(isset($check)){    
        $sqlRes    = "UPDATE users SET 
                        password='".md5($password)."'
                        WHERE email='$email'";
        $result   =mysqli_query($con,$sqlRes);
        if($result) {
            $EmailExistMSG = 'Password Changed Successfully !!!';        
        // Converting the message into JSON format.
        $EmailExistJson = json_encode($EmailExistMSG);        
        // Echo the message.
        echo $EmailExistJson ;  
        }  
    }
    else{
        $EmailExistMSG = 'Email Not Matches Please Try Again !!!';        
        // Converting the message into JSON format.
        $EmailExistJson = json_encode($EmailExistMSG);        
        // Echo the message.
        echo $EmailExistJson ; 
    }
    mysqli_close($con);
?>