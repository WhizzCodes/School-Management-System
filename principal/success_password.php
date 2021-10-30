<?php

session_start();
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Login Page</title>
    <link rel="stylesheet" href="../css/navbar.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/homepagestyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
    <section>
        <div class="nav">
            <div class="logo">
                <h4><a href="../index.php">Cambridge University.</a> </h4>
            </div>
            <div class="links">
                <a href="../index.php" >Home</a>
                <a href="../studentlogin.php" class="mainlink">Student Login</a>
                <a href="../teacherlogin.php">Teacher Login</a>
                <a href="login.php">Principal Login</a>
                <a href="../contact.php">Contact</a>
                <a href="../student_register.php">SignUp</a>
            </div>
        </div>
        <div class="imgBx">
            <img src="../img/confirm_page.png">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Password Changed</h2>
                <div class="col-md-6">
                    <p> Password is changed.  <a href="login.php">Click here</a> to login.</p>
                </div>
                <!-- <h3>Login with social media</h3> -->
            </div>
        </div>
    </section>
</body>
</html>