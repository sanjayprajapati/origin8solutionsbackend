<?php
    
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    require('../db.php');
    

    // Getting the received JSON into $json variable.
    if(isset($_GET['token'])){
          $token          = mysqli_real_escape_string($con,$_GET['token']);
          $check  = mysqli_query($con, "SELECT * FROM api_token WHERE token = '$token'"); 
          
          if(mysqli_num_rows($check)>0) {
               $result = mysqli_fetch_assoc($check);
               $email  = $result['email'];               
               $livingRoom = mysqli_query($con, "SELECT * FROM living_room WHERE email='$email'");
               $livingRoomData = array();
               $kitchen = mysqli_query($con, "SELECT * FROM kitchen WHERE email='$email'");
               $kitchenData = array();
               $bedroomOne = mysqli_query($con, "SELECT * FROM bedroomone WHERE email='$email'");
               $bedroomOneData = array();
               $bedroomTwo = mysqli_query($con, "SELECT * FROM bedroomtwo WHERE email='$email'");
               $bedroomTwoData = array();
               if(mysqli_num_rows($livingRoom)>0){
                    $result = mysqli_fetch_assoc($livingRoom);
                    $livingRoomData[]= $result;
               }
               if(mysqli_num_rows($kitchen)>0){
                    $result = mysqli_fetch_assoc($kitchen);
                    $kitchenData[]= $result;
               }
               if(mysqli_num_rows($bedroomOne)>0){
                    $result = mysqli_fetch_assoc($bedroomOne);
                    $bedroomOneData[]= $result;
               }
               if(mysqli_num_rows($bedroomTwo)>0){
                    $result = mysqli_fetch_assoc($bedroomTwo);
                    $bedroomTwoData[]= $result;
               }
               echo '{"living_room": '.json_encode($livingRoomData).', "Kitchen": '.json_encode($kitchenData).', "bedroomOne": '.json_encode($bedroomOneData).', "bedroomTwo": '.json_encode($bedroomOneData).'}';
          }
          
    
    }else{
          $status = 'true';
          $data   = 'Please Provide API token.';
          $code   = '1';
          echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
     }

     //echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
    
   
?>