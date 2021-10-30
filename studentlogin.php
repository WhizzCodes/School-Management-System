<?php
require "partials/config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Page</title>
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/homepagestyles.css">
<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
            <a href="studentlogin.php" class="mainlink">Student Login</a>
            <a href="teacher/teacherlogin.php">Teacher Login</a>
            <a href="principal/login.php">Principal Login</a>
            <a href="contact.php">Contact</a>
            <a href="student_register.php">SignUp</a>
        </div>
    </div>
    <section>
        <div class="imgBx">
            <img src="../discussion_forum/img/principallogin.png">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Student Login</h2>
                <form action="student_login_submit.php" method="post" >
                    <div class="inputBx">
                        <span>Email Id</span>
                        <input type="text" name="email">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="remember">
                        <p><a href="principal/forget_password.php">Forget Password</a></p>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Sign In" name="submit">
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account?<a href="student_register.php">Sign up</a></p>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
</body>
</html>