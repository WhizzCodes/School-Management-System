<?php

session_start();

if(!isset($_SESSION['user_type']) || !isset($_SESSION['id']))
{
    header("location:forget_password.php");
    return;
}

require "../partials/config.php";

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
            <img src="../img/forget_password.jpg">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Confirmation Login</h2>
                <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    if(isset($_POST['submit']))
                    {
                        $password=trim($_POST['password']);
                        $confirmpassword=trim($_POST['confirmpassword']);
                        $studentid = $_SESSION['id'];
                        if ($password == $confirmpassword)
                        {
                            $sql="update student set password = '$password' where sid = '$studentid'";                            
                            $result=mysqli_query($conn,$sql);
                            header("location: success_password.php");

                        }
                        else
                        {
                            echo '<h4 class="text-danger">**Password and Confirm Password does not match.</h4>';
                        }
                    }
                }
                ?>
                <form action="verify.php" method="post">
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="inputBx">
                        <span>Confirm Password</span>
                        <input type="password" name="confirmpassword">
                    </div>
                    <!-- <div class="remember">
                        <label><input type="checkbox" name="remember">Remember me</label>
                    </div> -->
                    <div class="inputBx">
                        <input type="submit" value="Confirm" name="submit">
                    </div>
                    <!-- <div class="inputBx">
                        <p>Don't have an account?<a href="#">Sign up</a></p>
                    </div> -->
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
</body>
</html>