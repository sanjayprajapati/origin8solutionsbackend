<?php

        header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    require('../../db.php');

    if(isset($_GET['token'])){
        $token          = mysqli_real_escape_string($con,$_GET['token']);
        //$email          = mysqli_real_escape_string($con,$_GET['email']);
        $checkTokenRes  = mysqli_query($con, "SELECT * FROM api_token WHERE token = '$token'");

        //email authentication        


        if(mysqli_num_rows($checkTokenRes)>0){
            $checkTokenRow = mysqli_fetch_assoc($checkTokenRes);
            if($checkTokenRow['status'] == 1){
                $email   = $checkTokenRow['email'] ;
                if(isset($_GET['pin1'])){
                    $pin     = $_GET['pin1'];
                    $sqlRes    = "UPDATE living_room SET pin1 ='$pin'  WHERE email = '$email'";
                    
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Pin 1 Upadted successfully';
                        $code   = '5';
                    }else {
                        $status = 'true';
                        $data   = 'Pin 1 not updated';
                        $code   = '4';
                    }
                }
                if(isset($_GET['pin2'])){
                    $pin     = $_GET['pin2'];
                    $sqlRes    = "UPDATE living_room SET pin2 ='$pin'  WHERE email = '$email'";
                    
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Pin 2 Upadted successfully';
                        $code   = '5';
                    }else {
                        $status = 'true';
                        $data   = 'Pin 2 not updated';
                        $code   = '4';
                    }
                }
                if(isset($_GET['pin3'])){
                    $pin     = $_GET['pin3'];
                    $sqlRes    = "UPDATE living_room SET pin3 ='$pin'  WHERE email = '$email'";
                    
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Pin 3 Upadted successfully';
                        $code   = '5';
                    }else {
                        $status = 'true';
                        $data   = 'Pin 3 not updated';
                        $code   = '4';
                    }
                }
                if(isset($_GET['pin4'])){
                    $pin     = $_GET['pin4'];
                    $sqlRes    = "UPDATE living_room SET pin4 ='$pin'  WHERE email = '$email'";
                    
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Pin 4 Upadted successfully';
                        $code   = '5';
                    }else {
                        $status = 'true';
                        $data   = 'Pin 4 not updated';
                        $code   = '4';
                    }
                }
                if(isset($_GET['pin5'])){
                    $pin     = $_GET['pin5'];
                    $sqlRes    = "UPDATE living_room SET pin5 ='$pin'  WHERE email = '$email'";
                    
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Pin 5 Upadted successfully';
                        $code   = '5';
                    }else {
                        $status = 'true';
                        $data   = 'Pin 5 not updated';
                        $code   = '4';
                    }
                }

            }else{
                $status = 'true';
                $data   = 'API token deactivated';
                $code   = '3';
            }

        }else {
            $status = 'true';
            $data   = 'Please Provide Vailid API token.';
            $code   = '2';
        }


    }else{
        $status = 'true';
        $data   = 'Please Provide API token.';
        $code   = '1';
    }

   echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code])

 


?>
