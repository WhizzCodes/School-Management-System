<?php
session_start();

// if(!isset($_SESSION['user_type']) || !isset($_SESSION['sid']))
// {
//     header("location:login.php");
//     return;
// }
require "../partials/config.php";

$sql1 = "select s.sid ,s.fname, s.lname, month(date) as month, year(date) as year, SUM(CASE WHEN a.status = 'Present' THEN 1 ELSE 0 END) AS Present, SUM(CASE WHEN a.status = 'Abscent' THEN 1 ELSE 0 END) AS Abscent, SUM(CASE WHEN a.status = 'None' THEN 1 ELSE 0 END) AS None FROM attendance a INNER JOIN student s ON s.sid = a.sid WHERE s.sid=1 and month(date) = MONTH(NOW()) and year(date) = YEAR(NOW()) GROUP BY month(date), year(date)";
$result1=mysqli_query($conn,$sql1);
$data1=mysqli_fetch_assoc($result1);
$present1 = (int)$data1['Present'];
$abscent1 = (int)$data1['Abscent'];
$total1 = $present1 + $abscent1;
if($total1 == 0)
{
    $percent1 = 0;
}
else
{
    $percent1 = ($present1/$total1)*100;
}

// if($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//     if(isset($_POST['delete']))
//     {
//         $sql1=SELECT s.fname, s.lname, month(date), year(date), SUM(CASE WHEN a.status = 'Present' THEN 1 ELSE 0 END) AS Present, SUM(CASE WHEN a.status = 'Abscent' THEN 1 ELSE 0 END) AS Abscent, SUM(CASE WHEN a.status = 'None' THEN 1 ELSE 0 END) AS None FROM attendance a INNER JOIN student s ON s.sid = a.sid WHERE s.sid=1 GROUP BY month(date), year(date)
//         SELECT s.fname, s.lname, month(date), year(date), SUM(CASE WHEN a.status = 'Present' THEN 1 ELSE 0 END) AS Present, SUM(CASE WHEN a.status = 'Abscent' THEN 1 ELSE 0 END) AS Abscent, SUM(CASE WHEN a.status = 'None' THEN 1 ELSE 0 END) AS None FROM attendance a INNER JOIN student s ON s.sid = a.sid GROUP BY month(date), year(date)

//         mysqli_query($conn,$sql1);
//     }
// }

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

            <li class="nav-item active">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $_SESSION['name'] . '</span>';
                                } ?>
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
                        <h1 class="h3 mb-0 text-gray-800">Attendance</h1>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">This Month</h1>
                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-4 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 4px solid #FF4584;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Present</div>
                                             <?php
                                                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $data1['Present'] . '</div>';
                                                    ?> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-plus fa-2x text-gray-300"></i>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Abscent</div>
                                             <?php
                                                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $data1['Abscent'] . '</div>';
                                                    ?> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-minus fa-2x text-gray-300"></i>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Percent</div>
                                             <?php
                                                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $percent1 . '</div>';
                                                    ?> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-percent  fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Month, Year</th>
                                            <th>Present</th>
                                            <th>Abscent</th>
                                            <th>Total</th>
                                            <th>Percent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //$sql = "SELECT s.fname, s.lname, month(date) as month, year(date) as year, SUM(CASE WHEN a.status = \'Present\' THEN 1 ELSE 0 END) AS Present, SUM(CASE WHEN a.status = \'Abscent\' THEN 1 ELSE 0 END) AS Abscent, SUM(CASE WHEN a.status = \'None\' THEN 1 ELSE 0 END) AS None FROM attendance a INNER JOIN student s ON s.sid = a.sid WHERE s.sid=1 GROUP BY month(date), year(date)";
                                        $sql = "select s.sid ,s.fname, s.lname, month(date) as month, year(date) as year, SUM(CASE WHEN a.status = 'Present' THEN 1 ELSE 0 END) AS Present, SUM(CASE WHEN a.status = 'Abscent' THEN 1 ELSE 0 END) AS Abscent, SUM(CASE WHEN a.status = 'None' THEN 1 ELSE 0 END) AS None FROM attendance a INNER JOIN student s ON s.sid = a.sid WHERE s.sid=1 GROUP BY month(date), year(date)";
                                        $result=mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $present = (int)$row['Present'];
                                            $abscent = (int)$row['Abscent'];
                                            $total = $present + $abscent;
                                            if($total == 0)
                                            {
                                                $percent = 0;
                                            }
                                            else
                                            {
                                                $percent = ($present/$total)*100;
                                            }
                                            // $path='../'.$row['id_card'];
                                            echo '
                                            <tr>
                                                <th>'.$row['sid'].'</th>
                                                <td>'.$row['month'].'-'.$row['year'].'</td>
                                                <td>'.$row['Present'].'</td>
                                                <td>'.$row['Abscent'].'</td>                                               
                                                <td>'.$total.'</td>                                               
                                                <td>'.$percent.'% </td>                                               
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Month, Year</th>
                                            <th>Present</th>
                                            <th>Abscent</th>
                                            <th>Total</th>
                                            <th>Percent</th>
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