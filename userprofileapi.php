<?php

    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    require('db.php');

    if(isset($_GET['token'])){
        $token          = mysqli_real_escape_string($con,$_GET['token']);
        //$email          = mysqli_real_escape_string($con,$_GET['email']);
        $checkTokenRes  = mysqli_query($con, "SELECT * FROM users WHERE usertoken = '$token'");

        //email authentication        


        if(mysqli_num_rows($checkTokenRes)>0){
            $checkTokenRow = mysqli_fetch_assoc($checkTokenRes);
            $status = 'true';
                        $data   = $checkTokenRow;
                        $code   = '3';
            

        }else {
            $status = 'true';
            $data   = 'Please Provide Vailid API token.';
            $code   = '2';
        }


    }else{
        $status = 'true';
        $data   = 'Please Provide API token.(sdfasdf)';
        $code   = '1';
    }

   echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);

?>
