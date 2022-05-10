<?php

    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    require('db.php');


  
        $email          = mysqli_real_escape_string($con,$_POST['email']);
        $password           = mysqli_real_escape_string($con,$_POST['password']);
        //$email          = mysqli_real_escape_string($con,$_POST['email']);
        $checkTokenRes  = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '" . md5($password) . "'");

        //email authentication      
        echo json_encode({"email"=>$email, "password"=>$password})


        if(mysqli_num_rows($checkTokenRes)>0){
            $row = mysqli_fetch_assoc($checkTokenRes);
            if($row['status'] ==0){
                $query    = "SELECT  users.appartment_id, users.email, usertoken,username,mobile
                 FROM `users`
                 LEFT JOIN `appartment`
                 ON users.appartment_id=appartment.id
                  WHERE users.email = '$email'";
                $result = mysqli_query($con, $query) or die(mysql_error());
                $row1 = mysqli_fetch_assoc($result);
               // echo $row1['appartment_id'];
                if(mysqli_num_rows($result)>0){
                    if($row1['appartment_id'] == '1'){
                        $data  = $row1;
                        $status = 'true';
                        $code   = '1';
                    }
                    elseif($row1['appartment_id'] == '2'){
                        $data  = $row1;
                        $status = 'true';
                        $code   = '2';
                    }
                    elseif($row1['appartment_id'] == '3'){
                        $data  = $row1;
                        $status = 'true';
                        $code   = '3';
                    }
                    elseif($row1['appartment_id'] == '4'){
                        $data  = $row1;
                        $status = 'true';
                        $code   = '4';
                    }
                    elseif($row1['appartment_id'] == '5'){
                        $data  = $row1;
                        $status = 'true';
                        $code   = '5';
                    }
                    else{
                        $data  = $row1;
                        $status = 'true';
                        $code   = '6';
                    }
                }else {
                    $data  = $row;
                    $status = 'true';
                    $code   = '7';
                }              
            } else {
                $status = 'true';
                $data   = 'User not authorized';
                $code   = '8';
            }          

        }else{
            $status = 'true';
            $data   = 'User not found';
            $code   = '0';
        }

        


    echo json_encode({"status"=>$status, "data"=>$data, "code"=>$code})

 


?>
