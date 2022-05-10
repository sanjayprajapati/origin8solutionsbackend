<?php
    include("auth_session.php");
    include("../db.php");
    $username = '';
    $user_id = '';
    $room ='';
    
    //echo $username;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>View</title>

    <!-- Fontfaces CSS-->
    <link href="../assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/css/theme.css" rel="stylesheet" media="all">

</head>
<body>
    
<div class="page-wrapper">
        <!-- HEADER MOBILE-->
        
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="form-header"></div>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $_SESSION['dealer_name'];?>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                                       
                                                <a class="dropdown-item" href="logout.php">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="au-card au-card--no-shadow card  m-b-40">
                                    <div class="card">
                                    <?php
                                        if(isset($_GET['key'])){
                                            //echo 'YES';
                                            $sql = "SELECT * FROM users WHERE usertoken='".$_GET['key']."'";
                                            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                                            $row = mysqli_fetch_assoc($result);
                                            //echo json_encode($row);
                                            //echo $row['appartment_id'];
                                            if($result) {
                                                
                                                // $data = mysqli_fetch_assoc($setSwitch);
                                                $switches ="SELECT * FROM appartment WHERE (id='".$row['appartment_id']."')";
                                                $switchResult = mysqli_query($con,$switches);
                                                $switchRow    = mysqli_fetch_array($switchResult);
                                                //echo $switchRow['number_rooms'];
                                                $jsonData = array();
                                                for($i=1;$i<=$switchRow['number_rooms']; $i++){
                                                    $sqlswitch ="SELECT * FROM switches WHERE user_id='".$row['id']."' AND switch_role='1' AND room_name='room_".$i."'";
                                                    $setSwitch = mysqli_query($con,$sqlswitch) or die(mysqli_error($con));
                                                    //$data = mysqli_fetch_assoc($setSwitch);
                                                    //$jsonData = $data['room_name'];
                                                    //echo json_encode($jsonData);
                                                    ?>
                                                    <h2 class="">Room No. <?php echo $i;?></h2>
                                                    <table class="table">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Switch Name</th>
                                                            <th>Switch Status</th>
                                                            <th>Switch Role</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <?php  
                                                        if(!mysqli_num_rows($setSwitch)){
                                                            echo 'jai ho';
                                                        }else {
                                                            while($data = mysqli_fetch_array($setSwitch)){
                                                                echo "
                                                                    <tr>
                                                                        <td>".$data['id']."</td>
                                                                        <td>".$data['switch_name']."</td>
                                                                        <td>".$data['switch_status']."</td>
                                                                        <td>".$data['switch_role']."</td>
                                                                        <td><a class='edit' id='".$data['id']."' href='edit.php?id=".$data['id']."'>Edit</a></td>
                                                                    </tr>
                                                                ";
                                                            }
                                                        }

                                                        ?>


                                                    </table>
                                                    <?php

                                                }
                                                
                                            }
                                        }
                                    ?>  
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>
        
      </div>
    
    

    <!-- Jquery JS-->
    <script src="../assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../assets/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/vendor/wow/wow.min.js"></script>
    <script src="../assets/vendor/animsition/animsition.min.js"></script>
    <script src="../assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->

    <script>
       
        
    </script>


</body>
</html>
