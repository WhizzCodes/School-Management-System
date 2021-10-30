<?php
session_start();

if(!isset($_SESSION['user_type']) || !isset($_SESSION['id']))
{
    header("location:login.php");
    return;
}
require "../partials/config.php";

$examid = $_GET['id'];

$sql="select * from exams where id = $examid";

$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) 
    {
        $examid = $_POST['examid'];
        $class = implode(',', $_POST['class']);
        $examname = $_POST["examname"];
        $question = $_POST["question"];
        $duration = $_POST["duration"];
        $totalmarks = $_POST["totalmarks"];
        $startdate = $_POST["startdate"];
        $starttime = $_POST["starttime"];

        $sql="update exams set Class='$class', Title='$examname', Total Question=$question, Durations=$duration, Total Marks=$totalmarks, Start Date='$startdate', Start Time='$starttime' where id=$examid";
        echo $sql;
        $run = mysqli_query($conn,$sql);
        if ($run) {
            // header("Location: index.php");
            echo "Exam Updated Successfully";
        } else {
            // header("Location: index.php");
            echo "Exam Updated Unsuccessfully";
        }
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
        button.underline{
            text-decoration:underline;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #FF4584;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../teacher/index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-king"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Discussion Forum</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
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
                <a class="nav-link" href="student_table.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Total Students</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="class_table.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Total Classes</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="see_assignment.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>See Assignemnt</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Applications
            </div>

            <li class="nav-item ">
                <a class="nav-link" href="assignment.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Assignments</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="schedule_meeting.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Schedule Meeting</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="attendance.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Attendance</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="grade.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Grade</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../exams/index.php">
                    <i class="fas fa-fw fa-cog"></i>
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
                                <a class="dropdown-item" href="student_logout.php" data-toggle="modal" data-target="#logoutModal">
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
                        <h1 class="h3 mb-0 text-gray-800">Update Exam</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="container py-4">
                        <form action="update_exam.php" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="filterclass">Class</label>
                                        <select id="inputState" name="class[]" class="form-control" value="<?php echo $data['Class'] ?>" required>
                                            <option disabled selected>Choose Class...</option>
                                            <?php $sql = "SELECT class_id,Class FROM `class`";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '  <option>  <li><a class="dropdown-item">' . $row['Class'] . '</a></li></option>';
                                            } ?>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6 col-sm-4">
                                    <label for="examname">Title</label>
                                    <input type="text" class="form-control" id="examname" name="examname" value="<?php echo $data['Title'] ?>" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" id="question" name="question" value="<?php echo $data['Total Question'] ?>" placeholder="Enter Total Question">
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="duration">Durations</label>
                                    <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $data['Durations'] ?>" placeholder="Enter in Munutes">
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="totalmarks">Total Marks</label>
                                    <input type="text" class="form-control" id="totalmarks" name="totalmarks" value="<?php echo $data['Total Marks'] ?>" placeholder="Enter Total Marks">
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="startdate">Start Date</label>
                                        <input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo $data['Start Date']; ?>">
                                      </div>
                                </div>
                                <div class="col-md-6 col-sm-4">
                                    <label for="starttime">Start Time</label>
                                    <input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $data['Start Time'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 pt-4">
                                <input type="hidden" class="btn btn-primary btn-block" value="<?php echo $data['id']?>" name="examid">
                                </div>
                                <div class="col-md-4 col-sm-4 pt-4">
                                    <input type="submit" class="btn btn-primary btn-block" value="Update" name="submit">
                                </div>
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
                    <form action="../teacher/logout.php" method="post">
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