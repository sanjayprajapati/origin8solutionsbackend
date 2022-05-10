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
                                    <div class="">
                                    <?php
                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            if(isset($_POST['submit'])){
                                                $name = $_POST['name'];
                                                $sql ="UPDATE switches SET switch_name='$name' where id='$id'";
                                                $res = mysqli_query($con, $sql);
                                                $sql1="SELECT * FROM switches WHERE id='$id'";
                                                $res1= mysqli_query($con,$sql1);
                                                $pid = mysqli_fetch_assoc($res1);
                                                $uid = $pid['user_id'];
                                                if($res){
                                                    $userData = "SELECT * FROM  users WHERE id='$uid'";
                                                    $result = mysqli_query($con, $userData);
                                                    if($result){
                                                        $r = mysqli_fetch_assoc($result);
                                                        echo "
                                                        <p>Name Updated successfully!</p>
                                                        <a href='view.php?key=".$r['usertoken']."'>Back</a>
                                                        ";
                                                    }
                                                }
                                                
                                            }else{
                                                ?>
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input class="au-input au-input--full" type="text" name="name" placeholder="Switch Name" required>
                                                        </div>
                                                        
                                                        <input class="au-btn au-btn--block au-btn--green m-b-20" type="submit" value="Update" name="submit">
                                                        
                                                    </form>
                                                <?php
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
        
        $(document).ready(function(){
            $('#submit').click(function(){
                
            })
            

          });
        
    </script>


</body>
</html>
