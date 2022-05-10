<?php
    
    // Importing DBConfig.php file.
    require('db.php');
    

    // Getting the received JSON into $json variable.
    $json = file_get_contents('php://input');    
    // decoding the received JSON and store into $obj variable.
    $obj        = json_decode($json,true);  
    $username   = $obj['username'];    
    $email      = $obj['email'];    
    $password   = $obj['password'];
    $mobile     = $obj['phone'];
    $cityID     = $obj['CId']+1;
    $apprment   = $obj['PlanId']+1;

    //Checking Email is already exist or not using SQL query.
    $CheckSQL = "SELECT * FROM users WHERE email='$email'";
    $create_datetime = date("Y-m-d H:i:s");
    $role      = 0;
    $token     = uniqid();
    
    // Executing SQL Query.
    $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
    
    
    if(isset($check)){    
        $EmailExistMSG = 'Email Already Exist, Please Try Again !!!';        
        // Converting the message into JSON format.
        $EmailExistJson = json_encode($EmailExistMSG);        
        // Echo the message.
        echo $EmailExistJson ;     
    }
    else{
    
        // Creating SQL query and insert the record into MySQL database table.
        $query   = "INSERT INTO `users` (username, email, mobile, city_id, password, usertoken, created, status,appartment_id)
                VALUES ('$username', '$email', '$mobile','$cityID', '". md5($password) ."','$token', '$create_datetime', '0', '$apprment' )";
        $result  = mysqli_query($con, $query);
                //echo $con;
        $newUserId = $con->insert_id;
    
        if($result){
            $switches ="SELECT * FROM appartment WHERE (id='$apprment')";
            $switchResult = mysqli_query($con,$switches);
            $switchRow    = mysqli_fetch_array($switchResult);
            for($i=1; $i<=$switchRow['number_rooms'];$i++){
                $switchQuery = "INSERT INTO `switch_controller` (users_id, appartment_id,room_name, switch_one,switch_two,switch_three, switch_four,switch_five,switch_six,switch_seven,switch_eight)
                        VALUES('$newUserId','$apprment','room_".$i."','0','0','0','0','0','0','0','0')";
                        $res = mysqli_query($con, $switchQuery);
                for($j=1;$j<=8; $j++){
                    if($j< 6){
                        $swich = "INSERT INTO `switches` (user_id,appartment_id, room_name,switch_name,switch_status,switch_role)
                        VALUES ('$newUserId','$apprment','room_".$i."', 'Switch ".$j."', '0', '1')";
                        $sres = mysqli_query($con,$swich);
                    }
                    if($j> 5 && $j<=8 ) {
                        $swich = "INSERT INTO `switches` (user_id,appartment_id, room_name,switch_name,switch_status,switch_role)
                        VALUES ('$newUserId','$apprment','room_".$i."', 'Switch ".$j."', '0', '0')";
                        $sres = mysqli_query($con,$swich);
                    }
                }
                
            }
        
            // If the record inserted successfully then show the message.
            $MSG = 'User Registered Successfully' ;
            
            // Converting the message into JSON format.
            $json = json_encode($MSG);
            
            // Echo the message.
            echo $json ;
        
        }
        else{
        
            echo 'Try Again';
        
        }
    }
    mysqli_close($con);
?>