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
    <style>
        .social
        {
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <h4><a href="index.php">Cambridge University.</a> </h4>
        </div>
        <div class="links">
            <a href="index.php">Home</a>
            <a href="studentlogin.php">Student Login</a>
            <a href="teacher/teacherlogin.php">Teacher Login</a>
            <a href="principal/login.php">Principal Login</a>
            <a href="contact.php"  class="mainlink">Contact</a>
            <a href="student_register.php">SignUp</a>
        </div>
    </div>
    <br><br><br><br><br><br>
    <center><h2>Contact Us</h2></center>
    <div class="container shadow mt-3">
        <div class="row">
            <div class="col-md-6 col-sm-12" style="border-right: 2px solid black;">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            <div class="col-md-6 col-sm-12">
                <h3 style="color:#337ab7;">Cambridge University</h3>
                <p>Town-3 Colony, XYZ,</p>
                <p>Califonia.</p>
                <p>Email: cambridge.university@gmail.com</p>
                <p>Phone No.: 123456789 / 9687654312</p>
                <div class="navbar-dark">
                    <h3>Follow Us</h3>
                    <div class="social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
