<?php
session_start();

// require "partials/config.php";

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
$password = $_POST['password'];
$phone = $_POST['phonenumber'];
/*$allow = array('pdf');
$temp = explode(".", $_FILES['id_card']['name']);
$extension=end($temp);
$upload_file=$_FILES['id_card']['name'];
move_uploaded_file($_FILES['id_card']['temp_name'], "uploads/pdf/".$_FILES['id_card']['name']);*/

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder ="uploads/".$filename;
move_uploaded_file($tempname,$folder);


$q="select * from student where email='$email' ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
	echo "duplicate data";
}
else
{
    // $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    // $pass = array(); 
    // $alphaLength = strlen($alphabet) - 1; 
    // for ($i = 0; $i < 8; $i++) {
    //     $n = rand(0, $alphaLength);
    //     $pass[] = $alphabet[$n];
    // }
    // $passwo = implode($pass); 
	$q1 = "insert into student(fname,lname,email,password,phone,id_card,status) values ('$fname','$lname','$email','$password','$phone','$folder','Applied');";
	mysqli_query($con,$q1);
	header('location:waiting_students.php');
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/homepagestyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <h4><a href="index.php">Cambridge University.</a> </h4>
        </div>
        <div class="links">
                <a href="index.php" >Home</a>
                <a href="studentlogin.php">Student Login</a>
                <a href="teacher/teacherlogin.php">Teacher Login</a>
                <a href="principal/login.php">Principal Login</a>
                <a href="contact.php">Contact</a>
                <a href="student_register.php" class="mainlink">SignUp</a>
        </div>
    </div>
    <div>
       
    </div>
    <section>
        <div class="imgBx">
            <img src="img/signup.png">
        </div>
        <div class="contentBx">
            <div class="formBx">
               <br><br><br><br><br><br><br><br><br><br>
               
                <h2>Student Registration</h2>
                <form action="student_register.php" method="post" enctype="multipart/form-data">
                    <div class="inputBx">
                        <span>First Name</span>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div class="inputBx">
                        <span>Last Name</span>
                        <input type="text" id="password" name="lastname" required>
                    </div>
                    
                    
                    <div class="inputBx">
                        <span>Email Id</span>
                        <input type="emailid" id="emailid" name="emailid" required>
                    </div>

                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="inputBx">
                        <span>Phone Number</span>
                        <input type="text" id="phonenumber" name="phonenumber" required>
                    </div>

                    <!-- <div class="inputBx">
                        <span>Date of Birth</span>
                        <input type="date" id="dob" name="dob" required>
                    </div>

                    <div class="inputBx">
                        <span>Gender</span>
                        <input type="gender" id="gender" name="gender" required>
                    </div> -->
                   <!-- <div class="inputBx">
                        <span>Password</span>
                        <input type="password" id="password" name="password" required>
                    </div>-->
                       
                    <!-- <div class="inputBx">
                        <span>Address</span>
                        <textarea type="text" class="form-control" id="address" rows="3" name="address" required></textarea>
                    </div> -->
                    <div class="inputBx">
                   <span>Upload ID card(pdf file only)</span>
                    <input type="file" name="uploadfile" value="image" accept="application/pdf" required>
                </div>
                    
                    <div class="inputBx">
                        <input type="submit" id="register" value="Sign Up" name="submit">
                    </div>
                    
                    <div class="inputBx">
                        <p>Have an account?<a href="studentlogin.php">Sign In</a></p>
                    </div>

                    
                </form>
                <!-- <h3>Login with social media</h3> -->
                <ul class="sci">
                    <!-- <li><img src="img/signup.png"></li>
                    <li><img src="img/signup.png"></li>
                    <li><img src="img/signup.png"></li> -->
                </ul>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>