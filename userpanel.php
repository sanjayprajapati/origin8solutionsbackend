<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
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
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>
<body>
    
<div class="page-wrapper">
        <!-- HEADER MOBILE-->
       
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop-user">
                <div class="section__content ">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username'];?></a>
                                            <?php echo $_SESSION['email'];?>
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
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>Controll Panel</h3>
                                        
                                    </div>
                                    <div class="au-task js-list-load">
                                        
                                        <div class="form-wrap">
                                        <?php
                                            require('db.php');
                                            $email    = $_SESSION['email'];

                                            $query    = "SELECT * FROM `living_room` WHERE email='$email'";
                                            $result   = mysqli_query($con, $query);
                                            $row      = mysqli_fetch_assoc($result);
                                            echo $row['email'];
                                            $apprt    = $row['appartment_type'];
                                            // token fetch
                                            $query1    = "SELECT * FROM `api_token` WHERE email='$email'";
                                            $result1   = mysqli_query($con, $query1);
                                            $row1      = mysqli_fetch_assoc($result1);
                                            $token     = $row1['token'];
                                            $url       = "http://192.168.1.24/smarthome/".$apprt."/livingroom/update.php?token=".$token."&pin1=0";
                                            echo $url;
                                        ?>
                                        <div class="switch-section card">
                                            <div class="card-header">
                                                <h4>Living Room</h4> 
                                            </div>
                                            <div class="card-body">
                                                <input id="pin1" type="checkbox" data-toggle="toggle" checked>
                                                <input id="pin2" type="checkbox" data-toggle="toggle" checked>
                                                <input id="pin3" type="checkbox" data-toggle="toggle" checked>
                                                <input id="pin4" type="checkbox" data-toggle="toggle" checked>
                                            </div>
                                        </div>
                                        
                                        </div>
                                        
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

    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are in user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
            var url   = "http://192.168.1.24/smarthome/";
            var apprt = "<?php echo $apprt;?>";
            var token = "<?php echo $token;?>";
            var mid   ="/livingroom/update.php?token=";
            function a(){
                 console.log('a');
                 
                 var last  = "&pin1=1";
                 var final = url+apprt+mid+token+last;
                 console.log(final);
				$.getJSON(final, function(data) {
				 	console.log(data);
				 });
                 $(this).addClass('btn-danger');
                 $(this).removeClass('btn-success');
            }
            function b(){ console.log('b'); 
                var last  = "&pin1=0";
                var final = url+apprt+mid+token+last;
                 console.log(final);
				$.getJSON(final, function(data) {
				 	console.log(data);
				 });
                 $(this).removeClass('btn-danger');
                 $(this).addClass('btn-success');
            }

            $("#pin1").click(function() { 
                return (this.tog = !this.tog) ? a() : b();
            });
        });
    </script>


</body>
</html>
