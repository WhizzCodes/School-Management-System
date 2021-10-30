
<?php
session_start();
require "../partials/config.php";
?>
                        

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #FF4584;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-king"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Discussion Forum</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           <!-- Heading -->
           <div class="sidebar-heading">
                Tables
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../student/join_class.php">
                <i class="fa fa-user-plus" ></i>
                    <span>Join Class</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../student/meet_link.php">
                <i class="fa fa-users" ></i>
                    <span>All Meetings</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../student/completed_assignment.php">
                <i class="fa fa-check-square"></i>
                    <span>Completed Assignment</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../student/all_assignment.php">
                <i class="fa fa-book"></i>
                    <span>All Pending Assignment</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../student/attendance.php">
                <i class="fa fa-tasks"></i>
                    <span>Attendance</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../student/see_results.php">
                <i class="fa fa-percent"></i>
                    <span>See Grade</span></a>
            </li>
            
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                <i class="fa fa-file"></i>
                    <span>Examination</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow sticky-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $_SESSION['name'] . '</span>';
                                } ?>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                                <!-- <span class="caret"></span> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="height: 100%;">

                    <!-- Page Heading -->
                  

                
                    <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>

                    <div class="container px-5">
                    <div class="d-sm-flex align-items-center justify-content-between my-4">
                                <h1 class="h3 mb-0 text-gray-800" style="font-size:40px;color:white;">Result Score</h1>
                            </div>
                        <?php
                            // session_start();
                            // require "../partials/config.php";

                            $examid=$_POST['examid'];
                            // $marks=$_POST['marks'];

                            $sql1 = "select * from exams where id = $examid";
                            $result1 = mysqli_query($conn, $sql1);
                            $data1 = mysqli_fetch_assoc($result1);

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                            {
                                if (isset($_POST['examsubmit'])) 
                                {
                                    $exam_id = $_POST["examid"];
                                    $sid=$_SESSION['sid'];
                                    $sql2="select count(*) as total from questions where exam_id='$exam_id'";
                                    //echo $sql2; 
                                    $result11=mysqli_query($conn,$sql2);
                                    $data = mysqli_fetch_assoc($result11);
                                    $counts = $data['total']; 

                                    $count = 0;

                                    while($count < $counts)
                                    {
                                        $option[$count] = $_POST[$count];
                                        $count++;
                                    }

                                    $sql3="select * from questions where exam_id='$exam_id'";
                                    $result12 = mysqli_query($conn,$sql3);                                   
                                    $count = 0;
                                    $marks = 0;
                                    
                                    while ($row = mysqli_fetch_assoc($result12)) 
                                    {
                                        $option1 = $option[$count];
                                        $correct =  $row['correct_answer'];
                                        if($option1 == $correct)
                                        {
                                            $marks = $marks + $row['marks'];
                                        }
                                        $count++;
                                    }

                                    $sqlper="select * from exams where id='$exam_id'";
                                    $resultper = mysqli_query($conn,$sqlper);
                                    while ($row2 = mysqli_fetch_assoc($resultper)) 
                                    {
                                        $markper = $row2['Total Marks'];
                                        // $per = ($count*100) /$markper;
                                    }
                                    
                                   

                                    $per = ($marks*100) /$markper;

                                    $sql111 = "select * from exams where id='$exam_id'";
                                    $result111 = mysqli_query($conn, $sql111);
                                    $data111 = mysqli_fetch_assoc($result111);
                                    
                                    // Check whether this email exists
                                    $existSql = "SELECT sid, ex_id FROM submit_exam where ex_id  = '$exam_id'";
                                    $resultchk = mysqli_query($conn, $existSql);  
                                    $numRows = mysqli_num_rows($resultchk);
                                    $showError = "• Your Exam has been Submitted..";
                                    if($numRows>0){           
                                        echo'<br>'.$showError.' <br><br>';
                                        echo"• Result <br><br>";     
                                        // echo'<br> Precentage : '.$per.'%<br><br>';   
                                        echo "‣ You have scored ". $marks ." out of ". $data111['Total Marks'];                                    
                                    }
                                    else{
                                        $passing=35;
                                        if($per<35){           
                                            $sqlsub="INSERT INTO `submit_exam`(`sid`, `ex_id`, `total_score`,`percent`,`status`) VALUES ('$sid','$exam_id','$marks',$per,'Fail')";
                                            $resultsub=mysqli_query($conn,$sqlsub);
                                            echo' <br>'.$showError.' <br><br>';
                                            echo"Result <br><br>";    
                                            // echo'<br> Precentage : '.$per.'%<br><br>';   
                                            echo "You have scored ". $marks ." out of ". $data111['Total Marks'];  
                                           
                                        }
                                        else{
                                            $sqlsub="INSERT INTO `submit_exam`(`sid`, `ex_id`, `total_score`,`percent`,`status`) VALUES ('$sid','$exam_id','$marks',$per,'Pass')";
                                            $resultsub=mysqli_query($conn,$sqlsub);
                                            echo' <br>'.$showError.' <br><br>';
                                            echo"Result <br><br>";    
                                            // echo'<br> Precentage : '.$per.'%<br><br>';                                    
                                            echo "You have scored ". $marks ." out of ". $data111['Total Marks'];
                                        }
                                               
                                    }       
                                }
                            }
                        ?>
                            <div class="d-sm-flex align-items-center justify-content-between my-4">
                                <h1 class="h3 mb-0 text-gray-800">Keep it Up. Thank you for taking exam !!!</h1>
                            </div>

                    </div>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="logout.php" method="post">
                            <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

</body>
</html>

