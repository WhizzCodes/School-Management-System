<?php
require "../partials/config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login Page</title>
    <link rel="stylesheet" href="../css/navbar.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/homepagestyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <h4><a href="index.php">Cambridge University.</a> </h4>
        </div>
        <div class="links">
            <a href="../index.php" >Home</a>
            <a href="../studentlogin.php">Student Login</a>
            <a href="teacher/teacherlogin.php" class="mainlink">Teacher Login</a>
            <a href="../principal/login.php">Principal Login</a>
            <a href="../contact.php">Contact</a>
            <a href="../student_register.php">SignUp</a>
        </div>
    </div>
    <section>
        <div class="imgBx">
            <img src="../img/principallogin.png">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Teacher Login</h2>
                <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    if(isset($_POST['submit']))
                    {
                        $email=trim($_POST['email']);
                        $password=trim($_POST['password']);
                        $sql="select * from teacher where email = '$email' and password='$password'";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                        if(mysqli_num_rows($result) == 1)
                        {
                            session_start();
                            $_SESSION['user_type']='teacher';
                            $_SESSION['id']=$row['tid'];
                            $_SESSION['email']=$row['email'];
                            $_SESSION['name']=$row['fname']." ".$row['lname'];
                            header("location: index.php");
                        }
                        else 
                        {
                            echo '<h4 class="text-danger">**Invalid Username and Password</h4>';
                        }
                    }
                }
                ?>
                <form action="teacherlogin.php" method="post" >
                    <div class="inputBx">
                        <span>Email Id</span>
                        <input type="text" name="email">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <!-- <div class="remember">
                        <p><a href="principal/forget_password.php">Forget Password</a></p>
                    </div> -->
                    <div class="inputBx">
                        <input type="submit" value="Sign In" name="submit">
                    </div>
                </form>
                
            </div>
        </div>
    </section>
</body>
</html>