<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("../db.php");
$delid;
function deletUser($id) {
    $delQuery ="";
    echo $id;
}
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
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            Origin8Solutions
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            
        </header>
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
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
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
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    
                                    <table class="table">
                                        
                                            
                                        
                                        <tbody>
                                            <?php 
                                                $userData = "SELECT  users.city_id,users.id,username,email,usertoken,status,appartment_id
                                                FROM  users
                                                LEFT JOIN dealers
                                                ON users.city_id = dealers.city_id WHERE users.city_id = dealers.city_id";
                                                $result = mysqli_query($con, $userData) or die(mysqli_error($con));
                                                if($result){
                                                    echo "<thead><tr>
                                                        <th scope='col'>ID</th>
                                                        <th scope='col'>Name</th>
                                                        <th scope='col'>Email</th>
                                                        <th scope='col'>Token</th>
                                                        <th scope='col'>Appartment Type</th>
                                                        <th scope='col'>Api URL</th>
                                                        <th scope='col'>Status</th>
                                                        <th scope='col'>Actions</th>
                                                    </tr></thead><tbody>";
                                                    
                                                    while($row = mysqli_fetch_assoc($result)){?> 
                                                        <tr>
                                                            <td><?= $row['id']?></td>
                                                            <td><?=$row['username']?></td>
                                                            <td><?=$row['email']?></td>
                                                            <td><?=$row['usertoken']?></td>
                                                            
                                                            <?php
                                                            $appart = "SELECT appartment.id, appartment_name,number_rooms
                                                            FROM appartment
                                                             LEFT JOIN users
                                                             ON appartment.id = users.appartment_id WHERE appartment.id = '".$row['appartment_id']."'";
                                                             $appartRes = mysqli_query($con, $appart) or die(mysqli_error());
                                                            if($rowappart= mysqli_fetch_assoc($appartRes)){?>
                                                                <td><?=$rowappart['appartment_name']?></td>
                                                            <?php }?> 
                                                            <td>
                                                                <?php
                                                                $appart = "SELECT appartment.id, appartment_name,number_rooms
                                                                FROM appartment
                                                                 LEFT JOIN users
                                                                 ON appartment.id = users.appartment_id WHERE appartment.id = '".$row['appartment_id']."'";
                                                                 $appartRes = mysqli_query($con, $appart) or die(mysqli_error());
                                                                $delid = $row['usertoken'];
                                                                //echo $delid;
                                                                if($rowappart= mysqli_fetch_assoc($appartRes)){
                                                                    $base = "http://$_SERVER[HTTP_HOST]";
                                                                    for($i=1;$i<=$rowappart['number_rooms'];$i++){
                                                                        echo "<a href=''>$base/switches.php?apikey=".$row['usertoken']."&room=room_".$i."</a><br>";
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                            <?php if($row['status']==1){?>
                                                            <label class="toggleSwitch nolabel" onclick="">
                                                                <input type="checkbox" checked />
                                                                <span>
                                                                    <span>Inactive</span>
                                                                    <span>Active</span>
                                                                </span>
                                                                <a></a>
                                                            </label>
                                                            <?php } else{?>
                                                            <label class="toggleSwitch nolabel" onclick="">
                                                                <input type="checkbox" />
                                                                <span>
                                                                    <span>Inactive</span>
                                                                    <span>Active</span>
                                                                </span>
                                                                <a></a>
                                                            </label>
                                                            <?php }
                                                            echo "</td>";
                                                            ?>
                                                                <td>
                                                                    <a href="view.php?key=<?php echo $row['usertoken']?>" id="view_<?php echo $row['usertoken']?>" class="view">View </a>
                                                                <td> 
                                                            <?php
                                                        echo "</tr>";
                                                    }

                                                }else {
                                                    echo '<tr><td colspn="5">No data found!</td></tr>';
                                                }

                                            ?>
                                            
                                        </tbody>
                                        </table>
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
            // $('.delete').click(function(){
            //     var id = $(this).attr('id');
            //     var url= "view.php?key="+id;
            //     console.log(url);
            //     var data = "a=5&b=6&c=7";
            //     // $.ajax({
            //     //     url: "delete.php?key="+id,
            //     //     data: data,
            //     //     success: function(id) {
            //     //         alert(data); // alert the output from the PHP Script
            //     //     }
            //     // });
            //     // return false;
            //     var xmlhttp = new XMLHttpRequest();
            //     xmlhttp.onreadystatechange = function() {
            //     if (this.readyState == 4 && this.status == 200) {
            //         //document.getElementById("txtHint").innerHTML = this.responseText;
            //         alert(this.responseText)
            //     }
            //     };
            //     //xmlhttp.open("GET","delete.php?key="+id,true);
            //    // xmlhttp.send();
            // })
          });
        
    </script>


</body>
</html>
