<?php
session_start();

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
        $exam_id = $_POST["examid"];
        $ques_id = $_POST["quesid"];
        $question = $_POST["question"];
        $option[0] = $_POST["option1"];
        $option[1] = $_POST["option2"];
        $option[2] = $_POST["option3"];
        $option[3] = $_POST["option4"];
        $correctoption = $_POST["correctoption"];
        $marks = $_POST["marks"];

        $answer = serialize($option);

        $sql="update questions set question='$question', answer='$answer', correct_answer='$correctoption', marks=$marks where id=$ques_id and exam_id=$exam_id";
        echo $sql;
        $run = mysqli_query($conn,$sql);
        if ($run) {
            header("Location: view_questions_of_an_exam.php?id=".$exam_id);
            echo "Question Updated Successfully";
        } else {
            header("Location: view_questions_of_an_exam.php?id=".$exam_id);
            echo "Question Updated Unsuccessfully";
        }

    }
}

$eid = $_POST['eid'];
$qid = $_POST['qid'];

$sql="select * from questions where exam_id = $eid and id = $qid";

$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);

$answer1 = unserialize($data['answer']);

$correctoption = $data['correct_answer'];



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
                        <h1 class="h3 mb-0 text-gray-800">Update Question</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="container py-4">
                        <form action="update_question.php" method="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="question">Quesion</label>
                                    <input type="text" class="form-control" id="question" name="question" value="<?php echo $data['question'] ?>">
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-3 col-sm-12">
                                    <label for="option1">Option 1</label>
                                    <input type="text" class="form-control" id="option1" name="option1" value="<?php echo $answer1[0] ?>" >
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="option2">Option 2</label>
                                    <input type="text" class="form-control" id="option2" name="option2"  value="<?php echo $answer1[1] ?>"  >
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="option3">Option 3</label>
                                    <input type="text" class="form-control" id="option3" name="option3" value="<?php echo $answer1[2] ?>"  >
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="option4">Option 4</label>
                                    <input type="text" class="form-control" id="option4" name="option4" value="<?php echo $answer1[3] ?>"  >
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="correctoption">Correct Option</label>
                                        <input type="text" class="form-control" id="correctoption" name="correctoption" value="<?php echo $correctoption; ?>">
                                      </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="marks">Marks</label>
                                    <input type="text" class="form-control" id="marks" name="marks" value="<?php echo $data['marks'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 pt-4">
                                    <input type="hidden" class="form-control" id="examid" name="examid" value="<?php echo $data['exam_id']; ?>" >
                                    <input type="hidden" class="form-control" id="quesid" name="quesid" value="<?php echo $data['id']; ?>" >
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