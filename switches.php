<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    require('db.php');
    $status =  'null';
    $data   =  [];
    $code   =  'null';
    if(isset($_GET['apikey'])) {
        
        $token          = mysqli_real_escape_string($con,$_GET['apikey']);
        $checkTokenRes  = mysqli_query($con, "SELECT * FROM users WHERE usertoken = '$token'");
        $row            = mysqli_fetch_assoc($checkTokenRes);
        $userid         = $row['id'];
        //echo $userid;
        // echo $row;
        // $userid         = $row['id'];
        // echo $userid;
        if(isset($_GET['room'])){      
        $query = "SELECT * FROM switches WHERE user_id = '$userid' AND room_name='".$_GET['room']."'";
        $result      = mysqli_query($con,$query);
        
       // echo $room_num;
        if($result){
            //$data   =  [];
            $room_num = mysqli_num_rows($result);
           // $data = mysqli_fetch_assoc($result);
           // $room_data = mysqli_fetch_array($result);
            $i = 0;
            // while($room_data = mysqli_fetch_array($result)){                
            //     $data = mysqli_fetch_assoc($result);
            //     //echo json_encode($data['room_name']);
            //     //echo '{"RoomNum_'.$i.'": '.json_encode($data).'}';
            //     //echo '{"Room No '.$i.'": '.json_encode($result1['id']).', "Kitchen": '.json_encode($result1['room_name']).', "bedroomOne": '.json_encode($result1['switch_one']).', "bedroomTwo": '.json_encode($result1['switch_two']).'}';
            //    echo '"'.$data['id'].'"';
            //    //$i++; 
            // }
            $jsonData = array();
            while ($array = mysqli_fetch_assoc($result)) {
                $jsonData[] = $array;
                //$id         =$array['id'];
            }
           //echo json_encode($jsonData);

            //echo $jsonData;
                
               
               if(isset($_GET['switch_num'])){
                    $rnum = $_GET['switch_num'];
                    
                   // echo $ids;
                   if($rnum == 'all'){
                    if(isset($_GET['switch_status'])){
                        $switchval = '';
                        if($_GET['switch_status'] == 0){
                            $switchval =1;
                        }else {
                            $switchval =0;
                        }
                        $sqlRes    = "UPDATE switches SET 
                        switch_status='$switchval'
                        WHERE user_id = '$userid' AND room_name='".$_GET['room']."'";
                        if ($con->query($sqlRes) === TRUE) {
                            $status = 'true';
                            $data   = 'All Switch Updated successfully';
                            $code   = '1';
                            echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
                            exit;
                        }else {
                            $status = 'true';
                            $data   = 'Switch not updated';
                            $code   = '0';
                            echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
                            exit;
                        }
                    }
                   }
                   else{
                    $json = json_encode(["status"=>$status, "data"=>$jsonData[$rnum], "code"=>$code]);               
                    $ids = $jsonData[$rnum]['id'];
                    $switchStatus = $jsonData[$rnum]['switch_status'];
                        if(isset($_GET['switch_status'])){
                            $sqlRes    = "UPDATE switches SET 
                            switch_status='".$_GET['switch_status']."'
                            WHERE id='$ids'"; 
                            if ($con->query($sqlRes) === TRUE) {
                                $status = 'true';
                                $data   = 'Switch Updated successfully';
                                $code   = '1';
                                echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
                                exit;
                            }else {
                                $status = 'true';
                                $data   = 'Switch not updated';
                                $code   = '0';
                                echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
                                exit;
                            }
                        }
                        
                        
                        //$json = json_encode(["status"=>$status, "data"=>$jsonData, "code"=>$code]);
                        echo $json;
                        exit;
                    }
                }
                if(isset($_GET['allswitch'])) {
                    $json = json_encode(["status"=>$status, "data"=>$jsonData, "code"=>$code]);

                    $sqlRes    = "UPDATE switches SET 
                        switch_status='".$_GET['allswitch']."'
                        WHERE user_id = '$userid' AND room_name='".$_GET['room']."'"; 
                        if ($con->query($sqlRes) === TRUE) {
                            $status = 'true';
                            $data   = 'All Switches Updated successfully';
                            $code   = '1';
                            echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
                            exit;
                        }else {
                            $status = 'true';
                            $data   = 'Switch not updated';
                            $code   = '0';
                            echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code]);
                            exit;
                        }
                    echo $json;
                    exit;
                }
            }
            
           
            $json = json_encode(["status"=>$status, "data"=>$jsonData, "code"=>$code]);
        // echo stripslashes($json);
          print_r($json);
        }
    }

   //echo json_encode(["status"=>$status, "data"=>$data, "code"=>$code])

?>