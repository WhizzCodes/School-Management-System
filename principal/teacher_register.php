<?php
session_start();

if(!isset($_SESSION['user_type']) || !isset($_SESSION['id']))
{
    header("location:login.php");
    return;
}
require "../partials/config.php";

//session_start();
$con = mysqli_connect('localhost','root','','school_management');

if(!$con)	
{
	echo "not connected to server";
}

if(isset($_POST['submit']))
{
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['emailid'];
$phone = $_POST['phonenumber'];
$gender = $_POST['gender'];
$role = $_POST['role'];
$designation = $_POST['designation'];
/*$allow = array('pdf');
$temp = explode(".", $_FILES['id_card']['name']);
$extension=end($temp);
$upload_file=$_FILES['id_card']['name'];
move_uploaded_file($_FILES['id_card']['temp_name'], "uploads/pdf/".$_FILES['id_card']['name']);*/

// $filename = $_FILES["uploadfile"]["name"];
// $tempname = $_FILES["uploadfile"]["tmp_name"];
// $folder ="uploads/".$filename;
// move_uploaded_file($tempname,$folder);


$q="select * from teacher where email='$email' ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
	echo "duplicate data";
}
else
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $passwo = implode($pass); 
	$q1 = "insert into teacher(fname,lname,email,password,phone,gender,role,designation) values ('$fname','$lname','$email','$passwo','$phone','$gender','$role','$designation');";
	mysqli_query($con,$q1);
    // $mes = "Dear User,\nYour Password is". $passwo;
    // $msg = wordwrap($mes,70);
    // mail($email,"Discussion Forum Password",$msg);
	header('location:index.php');
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

    <title>Principal Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                <a class="nav-link" href="students_table.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Students</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="teachers_table.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Faculty</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Applications
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="teacher_register.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Faculty Registration</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pending_students.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Accept Student Form</span></a>
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
                                <!-- <span class="caret"></span> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Faculty Registration</h1>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="teacher_register.php" method="post">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="firstname">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="lastname">Last name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="email">E-Mail Id</label>
                                    <input type="text" class="form-control" id="emailid" name="emailid" placeholder="E-Mail Id" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="phone">Phone No.</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone No." required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label for="gender">Gender</label>
                                    <select id="inputState" name="gender" class="form-control" required>
                                      <option selected>Choose...</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="role">Role</label>
                                    <select id="inputState" name="role" class="form-control" required>
                                      <option selected>Choose...</option>
                                      <option value="HOD">HOD (Head Of Department)</option>
                                      <option value="Teacher">Teacher</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="designation">Designation</label>
                                    <select id="inputState" name="designation" class="form-control" required>
                                      <option selected>Choose...</option>
                                      <option value="CSE (Computer Science Engineering)">CSE (Computer Science Engineering)</option>
                                      <option value="ECE (Electronics and Communication Engineering)">ECE (Electronics and Communication Engineering)</option>
                                      <option value="EEE (Electronics and Electrical Engineering)">EEE (Electronics and Electrical Engineering)</option>
                                      <option value="ME (Mechanical Engineering)">ME (Mechanical Engineering)</option>
                                      <option value="CE (Civil Engineering)">CE (Civil Engineering)</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-primary btn-block" id="register" value="Register" name="submit">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                              </form>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

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
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>