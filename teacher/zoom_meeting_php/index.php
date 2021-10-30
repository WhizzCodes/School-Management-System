<?php
include('config.php');
include('api.php');
$arr['topic']='Test by Cambridge';
$arr['start_date']=date('2021-06-16 00:03:36');
$arr['duration']=60;
$arr['password']='school';
$arr['type']='2';
$result=createMeeting($arr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Meeting Section</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        button.underline{
            text-decoration:underline;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid" style="height: 100%;">
					<center>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="margin-top:40px ">Schedule Meeting</h1>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="schedule_meeting.php" method="Post">
							<?php 
							if(isset($result->id)){
								echo "Joining Url: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
								echo "Password: ".$result->password."<br/>";
								// echo "Start Time: ".$result->start_time."<br/>";
								echo "Duration: ".$result->duration."<br/>";
							}else{
								echo '<pre>';
								print_r($result);
							}
									
							?> 
                              </form>
                        </div>
                    </div>
					</center>
                    <!-- /.container-fluid -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            



<!-- Begin Page Content -->

<!-- /.container-fluid -->

</div>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit1'])) {
                   
                    $meeting_name = $_POST['meeting_name'];
                    $meeting_class = implode(',', $_POST['class']);
                    $meeting_info = $_POST['meeting_info'];
                    $start_date = $_POST['start_date'];
                    $start_time = $_POST['start_time'];
                    $meeting_link = $_POST['meeting_link'];

                    $sql1 = "INSERT INTO `schedule_meeting`(`meeting_name`,`meeting_class`,`meeting_info`,`start_date`,`start_time`,`meeting_link`) VALUES ('$meeting_name','$meeting_class','$meeting_info','$start_date','$start_time','$meeting_link');";

                    $run = mysqli_query($conn, $sql1);
                    if ($run) {
                        echo "Meeting Schedule Successfully";
                    } else {
                        echo "Meeting Schedule unSuccessfully";
                    }
                }
            }
            ?>




            <!-- Footer -->
           
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
