<?php
require "partials/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambridge University</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="nav">
            <div class="logo">
                <h4><a href="index.php">Cambridge University.</a> </h4>
            </div>
            <div class="links">
            <a href="index.php" class="mainlink" >Home</a>
                <a href="studentlogin.php">Student Login</a>
                <a href="teacher/teacherlogin.php">Teacher Login</a>
                <a href="principal/login.php">Principal Login</a>
                <a href="contact.php">Contact</a>
                <a href="student_register.php">SignUp</a>
            </div>
        </div>

        <!-- LANDING PAGE -->

        <div class="landing">
            <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
                <h1>Stay In <span style="color:#e0501b;font-size: 4vw"> & Learn Safe .</span> </h1>
                <h3>Enabling Our students to learn <br> & School is great place for education.</h3>
                <div class="btn">
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
                <img src="img/university.jpg" alt="">
            </div>
        </div>

        <!-- ABOUT SECTION -->

        <div class="about">
            <div class="aboutText" data-aos="fade-up" data-aos-duration="1000">
                <h1>Why is it important that <br> <span style="color:#2f8be0;font-size:3vw">You Stay Home & Learn ?</span> </h1>
                <img src="img/teacherimage.jpg" alt="" width="900" height="500">
            </div>
            <div class="aboutList" data-aos="fade-left" data-aos-duration="1000">
                <ol>
                    <li> 
                        <br>
                        <span>01</span>
                         <p>Develop children’s understanding of what makes a good learner, developing resilience, take risks, be resourceful, to be able to learn with and from each other.</p>
                    </li>
                    <li> 
                        <span>02</span>
                         <p>To further develop the school’s approach to sustainable leadership, including the development of middle leaders; identify talented and potential leaders, providing opportunities.</p>
                    </li>
                    <li> 
                        <span>03</span>
                         <p>To embed lesson study as a professional development and action research resource to enable us to investigate the best ways to help our pupils learn.</p>
                    </li>
                    <li> 
                        <span>04</span>
                         <p>To maintain the developments in stamina for writing to enable us to further develop strategies to improve writing skills</p>
                    </li>

                </ol>
            </div>
        </div>

        <!-- INFO SECTION -->

        <div class="infoSection">
            <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                <h1>Things we do during the <br> <span style="color:#e0501b">Coronavirus Quarantine.</span> </h1>
            </div>
            <div class="infoCards">
                <div class="card one" data-aos="fade-up" data-aos-duration="1000">
                    <img src="img/Daytodayteaching.jpg" class="cardoneImg" alt="" data-aos="fade-up" data-aos-duration="1100">
                    <div class="cardbgone"></div>
                    <div class="cardContent">
                        <h2>Day To Day Teaching </h2>
                        <p>We teach new topic on everyday and give you  detail explanation </p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/Daytodayteaching.jpg" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card two" data-aos="fade-up" data-aos-duration="1300">
                    <img src="img/newskills.jpg" class="cardtwoImg" alt="" data-aos="fade-up" data-aos-duration="1200">
                    <div class="cardbgtwo"></div>
                    <div class="cardContent">
                        <h2>Learn a New Skill</h2>
                        <p>During pandamic we give each  student with new  topic </p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/newskills.jpg" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card three" data-aos="fade-up" data-aos-duration="1600">
                    <img src="img/conference.png" class="cardthreeImg" alt="" data-aos="fade-up" data-aos-duration="1300">
                    <div class="cardbgone"></div>
                    <div class="cardContent">
                        <h2>Video Call Meeting</h2>
                        <p>Every saturday video conference with parents.</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/conference.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- BANNER AND FOOTER -->

        <div class="banner">
            <div class="bannerText" data-aos="fade-right" data-aos-duration="1000">
                <h1>Download Our School App Today. <br> <span style="font-size:1.6vw;font-weight:normal"  class="bannerInnerText">
                    Stay Updated and focus on study!
                </span> </h1>
                <a href="#"> <img src="img/AndroidPNG.png" alt=""> </a>
                <a href="#"> <img src="img/iosPNG.png" alt=""> </a>
            </div>
            <div class="bannerImg" data-aos="fade-up" data-aos-duration="1000">
                <img src="img/MobileApp.png" alt="">
            </div>
        </div>

        <div class="footer">
            <h2>Cambridge University.</h2>
            <div class="footerlinks">
                <a href="#" class="mainlink">School Updates</a>
                <a href="#">Help</a>
                <a href="#">About</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
            AOS.init();
    </script>
</body>
</html>