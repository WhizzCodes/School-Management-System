<?php
session_start();
require "../partials/config.php";

$examId = $_GET['id'];
$sql1 = "select * from exams where id = $examId";
$result1 = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_assoc($result1);
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../student/index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-king"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Discussion Forum</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../student/index.php">
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
        <div id="content-wrapper" class="d-flex flex-column" target="_blank">

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

                <!-- Begin Page Content -->
                <div class="container-fluid" id="formdis">
                <form action="examsubmit.php" method="POST" id="examsubmit" onsubmit="return confirm('Are you sure you want to submit Exam?');">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $data1['Title'] . " (" . $data1['Class'] . ")" ?></h1>
                        <h1 class="h3 mb-0 text-gray-800" id="countdown"></h1>
                    </div>
                    <?php
                    $sql = "select * from exams where id = $examId";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo
                        '<div class="card shadow mb-4">
                                <div class="d-flex justify-content-center card-body mt-2">
                                            <h6 class="card-subtitle text-muted"><b>Start Date:</b>   ' . $row['Start Date'] . '</h6>
                                            <h6 class="card-subtitle mb-2 ml-5 text-muted"><b>Start Time:</b>  ' . $row['Start Time'] . '</h6>
                                            <h6 class="card-subtitle mb-2 ml-5 text-muted"><b>Total Questions:</b>  ' . $row['Total Question'] . '</h6>
                                            <h6 class="card-subtitle mb-2 ml-5 text-muted"><b>Duration:</b>  ' . $row['Durations'] . '</h6>
                                            <h6 class="card-subtitle mb-2 ml-5 text-muted"><b>Marks:</b>  ' . $row['Total Marks'] . '</h6>
                                        
                                    </div>
                                </div>';
                    }
                    $result1 = mysqli_query($conn, $sql);
                    $data1 = mysqli_fetch_assoc($result1);
                    ?>
                    <form action="teke_exam.php" method="post">
                    <?php
                    $sql2 = "select * from questions where exam_id = $examId";
                    $result2 = mysqli_query($conn, $sql2);
                    $d = 0;
                    while ($row = mysqli_fetch_assoc($result2)) {
                        echo
                        '<div class="card shadow mb-4">
                        <div class="card-body mt-2">   
                        <h1 style="display: flex;justify-content: space-between;">
                            
                            <span><h6 class="card-subtitle text-muted"><b>' . $row['question'] . '</h6><br></span>
                            <h6 class="card-subtitle text-muted"><b>Marks ' . $row['marks'] . '</h6><br>
                            <input type="hidden" value="'.$row["id"].'" name=""qid[' . $row["id"] . ']"">
                            </h1>';

                        $option = unserialize($row['answer']);
                        $c = 0;
                        while ($c < count($option)) {
                            echo '<div class="form-check">
                                    <input class="form-check-input" type="radio" name="'. $d .'" id="answer" value="' . $option[$c] . '" required>
                                    <label class="form-check-label" for="answer">
                                    ' . $option[$c] . '  
                                    </label>
                                  </div>';
                            $c++;
                        }
                        echo '</div>
                        </div>';
                        $d++;
                    }
                    $result1 = mysqli_query($conn, $sql);
                    $data1 = mysqli_fetch_assoc($result1);
                    ?>
                    <div class="card shadow mb-4">
                        <div class="d-flex justify-content-end card-body mt-2">
                            <div class="col-md-4 col-sm-4 pt-4">
                                    <input type="hidden" class="form-control" id="examid" name="examid" value="<?php echo $examId; ?>" >
                            </div>
                            <div class="col-md-4 col-sm-4 pt-4">
                                    <input type="submit" class="btn btn-primary btn-block" value="Submit" name="examsubmit">
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- /.container-fluid --

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
          
            <!-- Script for countdown -->
            <script>

                // form alert
                function validate(form) {
                    if (!valid) {
                        alert('Please correct the errors in the form!');
                        return false;
                    } else {
                        return confirm('Do you really want to submit the form?');
                    }
                }
                const startingMinutes = <?php echo $data1['Durations']; ?>;
                let time = startingMinutes * 60;
                const countdownEl = document.getElementById('countdown');
                setInterval(updateCountdown, 1000);

                function updateCountdown() {
                    const minutes = Math.floor(time / 60);
                    let seconds = time % 60;
                    seconds = seconds < 10 ? '0' + seconds : seconds;
                    countdownEl.innerHTML = `${minutes}:${seconds}`;
                    time--;
                }
            </script>

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
                    <form action="../student/logout.php" method="post">
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