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
               
        $query = "SELECT *  FROM switch_controller WHERE users_id = '$userid'";
        $result      = mysqli_query($con,$query);
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
           // echo json_encode($jsonData);

            // for($i=1;$i<=$room_num;$i++) { 
            //     echo json_encode($data['id']);
            // }
            
           //echo json_encode($data['id']);
           
                
            //echo $jsonData[0]['id'];
            if(isset($_GET['room'])){
                $rnum     = $_GET['room'];
                $json = json_encode(["status"=>$status, "data"=>$jsonData[$rnum], "code"=>$code]);               
                $ids = $jsonData[$rnum]['id'];
                //echo $ids;
                if(isset($_GET['allpin'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_one ='".$_GET['allpin']."',
                    switch_two='".$_GET['allpin']."',
                    switch_three='".$_GET['allpin']."',
                    switch_four='".$_GET['allpin']."',
                    switch_five='".$_GET['allpin']."',
                    switch_six='".$_GET['allpin']."',
                    switch_seven='".$_GET['allpin']."',
                    switch_eight='".$_GET['allpin']."'
                    WHERE id='$ids'";
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
                    echo stripslashes($json);
                    exit;
                }
                if(isset($_GET['switch1'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_one ='".$_GET['switch1']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 1 Updated successfully';
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
                if(isset($_GET['switch2'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_two ='".$_GET['switch2']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 2 Updated successfully';
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
                if(isset($_GET['switch3'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_three ='".$_GET['switch3']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 3 Updated successfully';
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
                if(isset($_GET['switch4'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_four ='".$_GET['switch4']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 4 Updated successfully';
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
                if(isset($_GET['switch5'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_five ='".$_GET['switch5']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 5 Updated successfully';
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
                if(isset($_GET['switch6'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_six ='".$_GET['switch6']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 6 Updated successfully';
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
                if(isset($_GET['switch7'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_seven ='".$_GET['switch7']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 7 Updated successfully';
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
                if(isset($_GET['switch8'])){
                    $sqlRes    = "UPDATE switch_controller SET 
                    switch_eight ='".$_GET['switch8']."'
                    WHERE id='$ids'"; 
                    if ($con->query($sqlRes) === TRUE) {
                        $status = 'true';
                        $data   = 'Switch 8 Updated successfully';
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
                echo stripslashes($json);
                exit;
                
            }
           
           $json = json_encode(["status"=>$status, "data"=>$jsonData, "code"=>$code]);
           echo stripslashes($json);
        }
    }

   //echo json_encode(["status"=>$status, "data"=>$json, "code"=>$code])

?>