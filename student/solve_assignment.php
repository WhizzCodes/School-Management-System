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

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        button.underline {
            text-decoration: underline;
        }
    </style>

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
                <a class="nav-link" href="join_class.php">
                <i class="fa fa-user-plus" ></i>
                    <span>Join Class</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="meet_link.php">
                <i class="fa fa-users" ></i>
                    <span>All Meetings</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="completed_assignment.php">
                <i class="fa fa-check-square"></i>
                    <span>Completed Assignment</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="all_assignment.php">
                <i class="fa fa-book"></i>
                    <span>All Pending Assignment</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="attendance.php">
                <i class="fa fa-tasks"></i>
                    <span>Attendance</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="see_results.php">
                <i class="fa fa-percent"></i>
                    <span>See Grade</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../student_exam/index.php">
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
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="student_logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <?php
                $con = mysqli_connect('localhost','root','','school_management');
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['submit'])) {
                    
                        $assignmentname = (int)$_POST['assignmentname'];
                        $filename = $_FILES["uploadfile"]["name"];
                        $tempname = $_FILES["uploadfile"]["tmp_name"];
                        $folder ="../uploads/submit_assignment/".$filename;
                        move_uploaded_file($tempname,$folder);

                        $answer = $_POST['assignment_info'];
                        

                        $id=(int)$_SESSION['sid'];
                        if ($filename || $answer)
                        {
                            $sql1 = "INSERT INTO `solved_assignment`(`student_id`, `assignment_id`, `answers`, `upload_answer`, `remarks`,`grade`) VALUES ($id,$assignmentname,'$answer','$folder','Marked','Not graded')";
                            //echo $sql1;
                            $run = mysqli_query($con, $sql1);
                            //echo $run;
                            //echo "$assignmentname";
                            if ($run) {
                                echo "Assignment submitted Successfully";
                            } else {
                                echo "Assignment submission UnSuccessful";
                            }
                        }
                        else
                        {
                            echo "Invalid Entry";
                        }
                    }
                }
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" style="height: 100%;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Assignment Upload</h1>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="solve_assignment.php" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="assignmentname">Assignment Subject</label>

                                        <select id="inputState" name="assignmentname" class="form-control" required>
                                            <option disabled selected>Choose Assignment...</option>
                                            <?php
                                            $class_joined = $_SESSION['class_joined'];
                                            $sql = "SELECT schedule_assignment.assignment_id, assignment_name FROM `schedule_assignment`, `solved_assignment` WHERE assignment_class='".$class_joined."' and schedule_assignment.assignment_id<>solved_assignment.assignment_id and solved_assignment.student_id=".$_SESSION['sid'];
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="'.$row['assignment_id'].'">'.$row['assignment_name'].'</option>';
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="uploadassignment">Upload Assignment</label>
                                        <div class="form-control">
                                            <input type="file" name="uploadfile" value="image" accept="application/pdf">
                                        </div>
                                    </div>

                                  <div class="form-group col-md-12">
                                    <label for="assignmentinfo">Answer</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="assignment_info" rows="10" placeholder="Assignment Answer"></textarea>
                                  </div>
                                

                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-primary btn-block" id="register" value="Submit" name="submit">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            





            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        var elem = document.getElementById("mydoc1");
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen();
        }
    </script>

</body>

</html>