<?php

        header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    require('../../db.php');

    	

 

/*
 
    if (isset($_GET['id']) && $_GET['id']!="") {
        
        $id = $_GET['id'];
        //echo $id;
        $query = "SELECT * FROM `living_room` WHERE id=$id";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $Data['id'] = $row['id'];
        $Data['email'] = $row['email'];
        $Data['password'] = $row['password'];
        $Data['AC'] = $row['AC'];
        $Data['celiing_fan'] = $row['celiing_fan'];
        $Data['tube_light'] = $row['tube_light'];
        $Data['tv'] = $row['tv'];
        $Data['fridge'] = $row['fridge'];
        $Data['led_light'] = $row['led_light'];
        $Data['geezer'] = $row['geezer'];
        $Data['night_bulb'] = $row['night_bulb'];
        $response["user_data"] = $Data;
    
    } else {
        $response["status"] = "false";
        $response["message"] = "No customer(s) found!";
    }
*/
    if(isset($_GET['token'])){
        $token          = mysqli_real_escape_string($con,$_GET['token']);
        //$email          = mysqli_real_escape_string($con,$_GET['email']);
        $checkTokenRes  = mysqli_query($con, "SELECT * FROM api_token WHERE token = '$token'");

        //email authentication        


        if(mysqli_num_rows($checkTokenRes)>0){
            $checkTokenRow = mysqli_fetch_assoc($checkTokenRes);
            if($checkTokenRow['status'] == 1){
                $email   = $checkTokenRow['email'] ;

                $sqlRes    = mysqli_query($con, "SELECT * FROM kitchen  WHERE email = '$email'");
                if(mysqli_num_rows($sqlRes)>0){
                    $data  = [];
                    while($row = mysqli_fetch_assoc($sqlRes)){
                        $data  = $row;
                    }
                    $status = 'true';
                    $code   = '5';

                }else {
                    $status = 'true';
                    $data   = 'Data not found';
                    $code   = '4';
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
