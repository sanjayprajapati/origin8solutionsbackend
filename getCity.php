<?php

    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    require('db.php');

    $query  ="SELECT * FROM cities";
    $result = mysqli_query($con, $query);
    $jsonData = array();
    while ($array = mysqli_fetch_assoc($result)) {
        $jsonData[] = $array;
        //$id         =$array['id'];
    }
    $json = json_encode(["status"=>'true', "data"=>$jsonData, "code"=>'1']);
    echo $json;
    //echo stripslashes($json);

?>