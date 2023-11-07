<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        .special:hover {
            color: #7380EC;
        }
    </style>
    <header>
        <div class="logo" title="Online course registration">
            <!-- <img src="./images/logo.png" alt=""> -->
            <h2>U<span class="danger">M</span>S</h2>
        </div>
        <div class="navbar">
            <a href="index2.php" class="active">
                <!-- <span class="material-icons-sharp">home</span> -->
                <h3>Home</h3>
            </a>
            <!-- <a href="timetable.html" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Time Table</h3>
            </a>  -->
            <!-- <a href="exam.html">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Examination</h3>
            </a> -->
            <!-- <a href="password.html">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a> -->
            <a href="logout.php">
                <!-- <span class="material-icons-sharp" onclick="">logout</span> -->
                <h3>Logout</h3>
            </a>
        </div>
        <!-- <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div> -->
        
    </header>
    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <!-- <div class="profile-photo">
                        <img src="./images/profile-1.jpg" alt="">
                    </div> -->
                    <div class="info">
                        <p style="font-size: 20px; font-weight: bold;">Hey, <?php echo $user_data['sur_name']; ?>
                        <!-- <small class="text-muted">12115153</small> -->
                    </div>
                </div>
                <div class="about">
                    <h5><a style="font-size: 12px;" class="special" href="registration.php">Register Course</a></h5>
                    <!-- <p>BCA(P124). "Bachelor Of Computer Application"</p>
                    <h5>DOB</h5>
                    <p>15-Sept-2000</p>
                    <h5>Contact</h5>
                    <p>9984675874</p>
                    <h5>Email</h5>
                    <p>mahsank111@gmail.com</p>
                    <h5>Address</h5>
                    <p>168, Eden Enclave, Kursi Road, Lucknow</p> -->
                </div>
            </div>
        </aside>

        <main>
            <h1>Dashboard</h1>
            

            <div class="timetable" id="timetable">
                <h3 style="font-size: 20px; margin-bottom: 15px;">Hello <?php echo $user_data['sur_name']; ?> </h3>
                <p style="margin: 10px 0px;">How are you today?</p>

                <p style="cursor: pointer;">Please you are advised to register your courses. Click here to <a href="registration.php" style="color: red;">register</a></p>
            </div>
        </main>

        <!-- <div class="right">
            <div class="announcements">
                <h2>Announcements</h2>
                <div class="updates">
                    <div class="message">
                        <p> <b>Academic</b> Summer training internship with Live Projects.</p>
                        <small class="text-muted">2 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Co-curricular</b> Global internship oportunity by Student organization.</p>
                        <small class="text-muted">10 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Examination</b> Instructions for Mid Term Examination.</p>
                        <small class="text-muted">Yesterday</small>
                    </div>
                </div>
            </div>

            <div class="leaves">
                <h2>Teachers on leave</h2>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-2.jpeg" alt=""></div>
                    <div class="info">
                        <h3>The Professor</h3>
                        <small class="text-muted">Day Span : Full Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-3.jpg" alt=""></div>
                    <div class="info">
                        <h3>Lisa Manobal</h3>
                        <small class="text-muted">Day Span : Half Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-4.jpeg" alt=""></div>
                    <div class="info">
                        <h3>Saif Khan</h3>
                        <small class="text-muted">Day Span : Full Day</small>
                    </div>
                </div>
            </div>

        </div> -->
    </div>

    <script src="timeTable.js"></script>
    <script src="app.js"></script>
</body>
</html>