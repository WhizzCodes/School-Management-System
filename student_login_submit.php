<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
   require 'partials/config.php';
   $email=$_POST['email'];
   $pass=$_POST['password'];

   $sql="SELECT * FROM student WHERE email='$email'";
   $result=mysqli_query($conn,$sql); 
   $numRows=mysqli_num_rows($result);     
      if($numRows==1){
          $row=mysqli_fetch_assoc($result);
                if($pass==$row['password']){ 
                  $status = $row['status'];
                  if($status == 'Applied')
                  {
                        header("Location: waiting_students.php");
                        exit();
                  }
                  else
                  {
                        session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['sid']=$row['sid'];
                        $_SESSION['name']=$row['fname']." ".$row['lname']; 
                        $_SESSION['class_joined']=$row['class_joined'];
                        header("Location: ../discussion_forum/student/index.php");
                        exit();
                  }
                }                
          }
          echo '<h4 class="text-danger">**Invalid Username and Password</h4>';
      }
?>