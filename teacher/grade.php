<?php
session_start();

error_reporting(E_ALL ^ E_WARNING); 

if(!isset($_SESSION['user_type']) || !isset($_SESSION['id']))
{
    header("location:login.php");
    return;
}
require "../partials/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) 
    {
        $sid = $_POST["sid"];
        $date = $_POST["date"];
        $status = $_POST["status"];

        $sql = "INSERT INTO `attendance`(`sid`, `date`, `status`) VALUES ($sid,'$date','$status')";
        echo $sql;
        $run = mysqli_query($conn,$sql);
        if ($run) {
            echo "Attendance Posted Successfully";
        } else {
            echo "Attendance Posted Unsuccessfully";
        }
    }
}
if(isset($_POST['submit_marks'])){
    $sid=$_POST['sid'];
    $aid=$_POST['aid'];
    $remark=$_POST['remark'];
    $obtained_marks=$_POST['marks'];
    $outof=$_POST['outof'];
    $sql="update solved_assignment set remarks='$remark', marks_obtained=$obtained_marks, marks_out_of=$outof where student_id=$sid and assignment_id=$aid";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo "Cannot update now. Please try after some time";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
            <li class="nav-item">
                <a class="nav-link" href="../teacher/index.php">
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
                <a class="nav-link" href="../teacher/student_table.php">
                <i class="fa fa-users" ></i>
                    <span>Total Students</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../teacher/class_table.php">
                <i class="fa fa-user-plus" ></i>
                    <span>Total Classes</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../teacher/see_assignment.php">
                <i class="fa fa-eye"></i>
                    <span>See Assignemnt</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Applications
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../teacher/assignment.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Assignments</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="../teacher/schedule_meeting.php">
                <i class="fa fa-id-badge"></i>
                    <span>Schedule Meeting</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../teacher/attendance.php">
                <i class="fa fa-tasks"></i>
                    <span>Attendance</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../teacher/grade.php">
                <i class="fa fa-percent"></i>
                    <span>Grade</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../exams/index.php">
                <i class="fa fa-file"></i>
                    <span>Exams</span></a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['name']?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="student_logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Grade</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="row">

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-12 mb-4">
                                    <div class="card shadow h-100 py-2" style="border-left: 4px solid #FF4584;">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total Students</div>
                                                    <?php
                                                            $sql="select count(sid) as c from student";
                                                            $result=mysqli_query($conn,$sql);
                                                            $row=mysqli_fetch_assoc($result);
                                                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row['c'].'</div>'
                                                            // echo $row['c'];
                                                        ?>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-12 mb-4">
                                    <div class="card shadow h-100 py-2" style="border-left: 4px solid #FF4584;">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Pass</div>
                                                    <?php
                                                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">40%</div>';
                                                            ?>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-12 mb-4">
                                    <div class="card shadow h-100 py-2" style="border-left: 4px solid #FF4584;">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Fail</div>
                                                    <?php
                                                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">3</div>';
                                                            ?>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-thumbs-down  fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="container py-4">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h5 class="h5 mb-0 text-gray-800">Mark Grade</h5>
                            </div>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <label for="filtermonth">Student Id.</label>
                                        <input type="text" class="form-control" name="sid" placeholder="Student Id"
                                            required>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="studentid">Assignment Id</label>
                                            <input type="text" class="form-control" name="aid"
                                                placeholder="Assignment Id">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="studentid">Remarks</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="remark">
                                                <option value="Marked" selected>Marked</option>
                                                <option value="Late">Late</option>
                                                <option value="Missed">Missed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="studentid">Marks</label>
                                            <input type="text" class="form-control" name="marks" id="marks"
                                                placeholder="Marks">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="studentid">Out Of</label>
                                            <input type="text" class="form-control" name="outof" id="outof"
                                                placeholder="Out Of">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 pt-4">
                                        <input type="submit" class="btn btn-primary btn-block" value="Mark" name="submit_marks">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Assignment Id</th>
                                            <th>Student Id</th>
                                            <th>Student Details</th>
                                            <th>Assignment Details</th>
                                            <th>Remark</th>
                                            <th>Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "select s.solved_assignment_id, s.marks_obtained, s.marks_out_of, s.assignment_id, std.sid, std.fname, std.lname, std.class_joined, sa.assignment_name, s.answers, s.upload_answer, s.remarks FROM solved_assignment s INNER JOIN student std ON std.sid = s.student_id INNER JOIN schedule_assignment sa ON s.assignment_id = sa.assignment_id";
                                        $result=mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $path=$row['upload_answer'];
                                            echo '<tr>
                                            <td>'.$row['assignment_id'].'</td>
                                            <td>'.$row['sid'].'</td>
                                            <td>'.$row['fname'].' '.$row['lname'].'<br>'.$row['class_joined'].'</td>
                                            <td>'.$row['assignment_name'].'<br><button class="btn underline" type="button" data-toggle="modal" data-target="#pdfModal1'.$row['solved_assignment_id'].'" >View answer</button><br><button class="btn underline" type="button" data-toggle="modal" data-target="#pdfModal'.$row['solved_assignment_id'].'" >View File</button></td>
                                            <td>'.$row['remarks'].'</td>
                                            <td>'.$row['marks_obtained'].'/'.$row['marks_out_of'].'</td>
                                            </tr>';

                                            // pdfModal
                                            echo '<div class="modal fade" id="pdfModal'.$row['solved_assignment_id'].'" tabindex="-1"
                                            aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Submitted file</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="orderDetails">
                                                        <embed src="'.$path.'" width="100%" height="450px" type="application/pdf">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>';

                                            echo '<div class="modal fade" id="pdfModal1'.$row['solved_assignment_id'].'" tabindex="-1"
                                            aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="orderDetails">
                                                        <p>'.$row['answers'].'</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>';
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Assignment Id</th>
                                            <th>Student Id</th>
                                            <th>Student Details</th>
                                            <th>Assignment Details</th>
                                            <th>Remark</th>
                                            <th>Marks</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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