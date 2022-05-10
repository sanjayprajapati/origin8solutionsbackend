<?php
    
    // Importing DBConfig.php file.
    require('db.php');
    

    // Getting the received JSON into $json variable.
    $json = file_get_contents('php://input');
    
    // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
    $email = $obj['email'];
    //$username = $obj['username'];
    $appart = $obj['appartment_type'];
    $CheckSQL = "SELECT * FROM users WHERE email='$email'";
    // Executing SQL Query.
    $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
    
    
    if(isset($check)){
        //$row = mysqli_fetch_assoc($con,$CheckSQL);
        //echo $email = $row['email'];
        // Creating SQL query and insert the record into MySQL database table.
        $Sql_Query = "INSERT INTO `appartment` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
             
       // $row       =mysqli_fetch_assoc()
        if(mysqli_query($con,$Sql_Query)){
            //$row = mysqli_fetch_assoc($con,$Sql_Query)
            $data= [];
            if($appart == 'onebhk') {
                $livingroom = "INSERT INTO `living_room` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $roomone = "INSERT INTO `bedroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $kitchen = "INSERT INTO `kitchen` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $bathroomone = "INSERT INTO `bathroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $studyroom = "INSERT INTO `studyroom` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                mysqli_query($con, $livingroom);
                mysqli_query($con, $roomone);
                mysqli_query($con, $kitchen);
                mysqli_query($con, $bathroomone);
                mysqli_query($con, $studyroom);
                $userId = $email;
                $status = 'true';
                $appartment_type   = 'onebhk';
                $code   = '1';
            } elseif($appart == 'twobhk'){
                $livingroom = "INSERT INTO `living_room` (email, appartment_type)
                     VALUES ('$email', '$appart')";
                $kitchen = "INSERT INTO `kitchen` (email, appartment_type)
                     VALUES ('$email', '$appart')";  
                $roomone = "INSERT INTO `bedroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $roomtwo = "INSERT INTO `bedroomtwo` (email, appartment_type)
                     VALUES ('$email', '$appart')";                
                $bathroomone = "INSERT INTO `bathroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $bathroomtwo = "INSERT INTO `bathroomtwo` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $studyroom = "INSERT INTO `studyroom` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                mysqli_query($con, $livingroom);
                mysqli_query($con, $kitchen);
                mysqli_query($con, $roomone);
                mysqli_query($con, $roomtwo);
                mysqli_query($con, $bathroomone);
                mysqli_query($con, $bathroomtwo);
                mysqli_query($con, $studyroom);
                $userId = $email;
                $status = 'true';
                $appartment_type   = 'twobhk';
                $code   = '2';
            }elseif($appart == 'threebhk'){
                $livingroom = "INSERT INTO `living_room` (email, appartment_type)
                     VALUES ('$email', '$appart')";
                $kitchen = "INSERT INTO `kitchen` (email, appartment_type)
                     VALUES ('$email', '$appart')";  
                $roomone = "INSERT INTO `bedroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $roomtwo = "INSERT INTO `bedroomtwo` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $roomthree = "INSERT INTO `bedroomthree` (email, appartment_type)
                     VALUES ('$email', '$appart')";                
                $bathroomone = "INSERT INTO `bathroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $bathroomtwo = "INSERT INTO `bathroomtwo` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $bathroomthree = "INSERT INTO `bathroomthree` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $studyroom = "INSERT INTO `studyroom` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                mysqli_query($con, $livingroom);
                mysqli_query($con, $kitchen);
                mysqli_query($con, $roomone);
                mysqli_query($con, $roomtwo);
                mysqli_query($con, $roomthree);
                mysqli_query($con, $bathroomone);
                mysqli_query($con, $bathroomtwo);
                mysqli_query($con, $bathroomthree);
                mysqli_query($con, $studyroom);
                $userId = $email;
                $status = 'true';
                $appartment_type   = 'threebhk';
                $code   = '3';
            }elseif($appart == 'fourbhk'){
                $livingroom = "INSERT INTO `living_room` (email, appartment_type)
                     VALUES ('$email', '$appart')";
                $kitchen = "INSERT INTO `kitchen` (email, appartment_type)
                     VALUES ('$email', '$appart')";  
                $roomone = "INSERT INTO `bedroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $roomtwo = "INSERT INTO `bedroomtwo` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $roomthree = "INSERT INTO `bedroomthree` (email, appartment_type)
                     VALUES ('$email', '$appart')";  
                $roomfour = "INSERT INTO `bedroomfour` (email, appartment_type)
                     VALUES ('$email', '$appart')";                
                $bathroomone = "INSERT INTO `bathroomone` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $bathroomtwo = "INSERT INTO `bathroomtwo` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                $bathroomthree = "INSERT INTO `bathroomthree` (email, appartment_type)
                     VALUES ('$email', '$appart')";
                $bathroomfour = "INSERT INTO `bathroomfour` (email, appartment_type)
                     VALUES ('$email', '$appart')";  
                $studyroom = "INSERT INTO `studyroom` (email, appartment_type)
                     VALUES ('$email', '$appart')"; 
                mysqli_query($con, $livingroom);
                mysqli_query($con, $kitchen);
                mysqli_query($con, $roomone);
                mysqli_query($con, $roomtwo);
                mysqli_query($con, $roomthree);
                mysqli_query($con, $roomfour);
                mysqli_query($con, $bathroomone);
                mysqli_query($con, $bathroomtwo);
                mysqli_query($con, $bathroomthree);
                mysqli_query($con, $bathroomfour);
                mysqli_query($con, $studyroom);
                $userId = $email;
                $status = 'true';
                $appartment_type   = 'fourbhk';
                $code   = '4';
            }elseif($appart == 'penthouse'){
                $livingroom = "INSERT INTO `living_room` (email, appartment_type)
                        VALUES ('$email', '$appart')";
                $kitchen = "INSERT INTO `kitchen` (email, appartment_type)
                        VALUES ('$email', '$appart')";  
                $roomone = "INSERT INTO `bedroomone` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $roomtwo = "INSERT INTO `bedroomtwo` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $roomthree = "INSERT INTO `bedroomthree` (email, appartment_type)
                        VALUES ('$email', '$appart')";  
                $roomfour = "INSERT INTO `bedroomfour` (email, appartment_type)
                        VALUES ('$email', '$appart')";                
                $bathroomone = "INSERT INTO `bathroomone` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $bathroomtwo = "INSERT INTO `bathroomtwo` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $bathroomthree = "INSERT INTO `bathroomthree` (email, appartment_type)
                        VALUES ('$email', '$appart')";
                $bathroomfour = "INSERT INTO `bathroomfour` (email, appartment_type)
                        VALUES ('$email', '$appart')";  
                $studyroom = "INSERT INTO `studyroom` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                mysqli_query($con, $livingroom);
                mysqli_query($con, $kitchen);
                mysqli_query($con, $roomone);
                mysqli_query($con, $roomtwo);
                mysqli_query($con, $roomthree);
                mysqli_query($con, $roomfour);
                mysqli_query($con, $bathroomone);
                mysqli_query($con, $bathroomtwo);
                mysqli_query($con, $bathroomthree);
                mysqli_query($con, $bathroomfour);
                mysqli_query($con, $studyroom);
                $userId = $email;
                $status = 'true';
                $appartment_type   = 'penthouse';
                $code   = '5';
            }else {
                $livingroom = "INSERT INTO `living_room` (email, appartment_type)
                        VALUES ('$email', '$appart')";
                $kitchen = "INSERT INTO `kitchen` (email, appartment_type)
                        VALUES ('$email', '$appart')";  
                $roomone = "INSERT INTO `bedroomone` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $roomtwo = "INSERT INTO `bedroomtwo` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $roomthree = "INSERT INTO `bedroomthree` (email, appartment_type)
                        VALUES ('$email', '$appart')";  
                $roomfour = "INSERT INTO `bedroomfour` (email, appartment_type)
                        VALUES ('$email', '$appart')";                
                $bathroomone = "INSERT INTO `bathroomone` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $bathroomtwo = "INSERT INTO `bathroomtwo` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                $bathroomthree = "INSERT INTO `bathroomthree` (email, appartment_type)
                        VALUES ('$email', '$appart')";
                $bathroomfour = "INSERT INTO `bathroomfour` (email, appartment_type)
                        VALUES ('$email', '$appart')";  
                $studyroom = "INSERT INTO `studyroom` (email, appartment_type)
                        VALUES ('$email', '$appart')"; 
                mysqli_query($con, $livingroom);
                mysqli_query($con, $kitchen);
                mysqli_query($con, $roomone);
                mysqli_query($con, $roomtwo);
                mysqli_query($con, $roomthree);
                mysqli_query($con, $roomfour);
                mysqli_query($con, $bathroomone);
                mysqli_query($con, $bathroomtwo);
                mysqli_query($con, $bathroomthree);
                mysqli_query($con, $bathroomfour);
                mysqli_query($con, $studyroom);
                $userId = $email;
                $status = 'true';
                $appartment_type   = 'farmhouse';
                $code   = '6'; 
            }
                      
            // Echo the message.            
        
        }else {
            $userId = '';
            $status = 'true';
            $data   = '';
            $code   = '7'; 
        }
    
    }
    echo json_encode(["status"=>$status, "appartment_type"=>$appartment_type,"email"=>$userId, "code"=>$code])
   
?>