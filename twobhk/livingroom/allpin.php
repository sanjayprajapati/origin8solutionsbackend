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
                if(isset($_GET['allpin'])){
                    $pin     = $_GET['allpin'];
                    if($pin === 'on'){
                        $sqlRes    = "UPDATE living_room SET 
                        pin1 ='1',
                        pin2 ='1',
                        pin3 ='1',
                        pin4 ='1',
                        pin5 ='1' 
                        WHERE email = '$email'";
                        
                        if ($con->query($sqlRes) === TRUE) {
                            $status = 'true';
                            $data   = 'All Switch ON successfully';
                            $code   = '5';
                        }else {
                            $status = 'true';
                            $data   = 'Switch not updated';
                            $code   = '4';
                        }
                    }
                    if($pin === 'off'){
                        $sqlRes    = "UPDATE living_room SET 
                        pin1 ='0',
                        pin2 ='0',
                        pin3 ='0',
                        pin4 ='0',
                        pin5 ='0' 
                        WHERE email = '$email'";
                        
                        if ($con->query($sqlRes) === TRUE) {
                            $status = 'true';
                            $data   = 'All Switch off successfully';
                            $code   = '5';
                        }else {
                            $status = 'true';
                            $data   = 'Switch not updated';
                            $code   = '4';
                        }
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

   echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);

 


?>
