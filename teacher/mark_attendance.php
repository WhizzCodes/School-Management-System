<?php 

$con = mysqli_connect('localhost','root','','school_management');

if(!$con)	
{
	echo "not connected to server";
}

if(isset($_POST['submit']))
{
    // echo "Hurray";
    $studentid = $_POST['studentid'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $q1 = "insert into teacher(sid,date,status) values ('$studentid','$date','$status');";
    mysqli_query($con,$q1);
	header('location: attendance.php');
}


?>