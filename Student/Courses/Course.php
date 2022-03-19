<?php
    include "database.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prociono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="https://img.icons8.com/color/50/000000/student-center.png" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../../Style.css">
    <link rel="stylesheet" href="Course.css">
    <title>OnlineCollegePortal</title>
</head>

<body>

    <navbar>
        <div id="navbar">
            <div>

                <div id="navbar-content">
                    <div id="logo">
                        <img src="../../image/Course-logo.png" alt="">
                    </div>

                    <ul>
                        <li><a href="../index.php">HOME</a></li>
                        <li><a href="../calendar/calender.php">CALENDER</a></li>
                        <li><a href="../Profile/Profile.php">PROFILE</a></li>
                        <li><a href="../../signIn.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </navbar>

    <!-- <hr class="hr"> -->

    <nav id="nav">

        <div id="my-side-nav" class="Side-nav">
        <div id="side-profile">
            <?php
                        $s_name = $_SESSION['name'];
                        $sql1 = "SELECT `s_image` FROM `student` WHERE s_name='$s_name'";
                        $result = mysqli_query($conn,$sql1);
                        while($row = mysqli_fetch_array($result)){

                            $img = $row['s_image'];
                            if(empty($img)){
                                echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ12nrZzihNnucandf2BnaYVDeg7M04_nCRtA&usqp=CAU' alt=''>";
                            }
                            else{
                                echo "<img src='../Profile/upload/{$img}' alt=''>";
                            }
                            
                            
                        }
                ?>
                <div id="side-profile-content">
                    <?php
                        echo "<h2>{$_SESSION['name']}</h2>
                        <p>{$_SESSION['email']}</p>";
    
                    ?>
                </div>
            </div>
            <hr>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img
                    src="https://img.icons8.com/ios/50/000000/close-window.png" /></a>
            <a href="Courses_page.php">COURSES</a>
            <a href="../Quiz/Quiz_page.php">QUIZ</a>
            <a href="../calendar/calender.php">CALENDAR</a>
            <a href="../Notice/Notice_page.php">NOTICE</a>
            <a href="../../signIn.php">LOGOUT</a>
        </div>

        <span onclick="openNav()"><img src="https://img.icons8.com/ios-glyphs/24/000000/menu--v2.png" /></span>

        <div id="main">
            <h4 id="main-h4">Dashboard</h4>
        </div>

    </nav>

    <section>
        <div class="Section-Container">

            <div id="courses">
                <div>
                    <h2>Courses : </h2>
                </div>
                
                <?php
                     $t_id = $_SESSION['t_id'];

                     $sql = "SELECT * FROM `courses`";
                     $result = mysqli_query($conn,$sql);
                     while($row = mysqli_fetch_array($result)){
                        $C_name = $row['C_name'];
                        // $page = '';
                        // if($C_name=='AOA'){
                        //     $page = 'AOA_S.php';
                        // }
                        // else if($C_name=='Math-4'){
                        //     $page = 'EM_S.php';
                        // }
                     echo "<div class='course-container' id='em-4'>
                     <div class='course-cont'>
                         <div class='modules'>
                             <a href='Courses_page.php?course={$C_name}'>{$row['C_name']}</h5></a>
                         </div>
                     </div>
                 </div>";
                     }
                ?>
                <!-- <div class="course-container" id="py">
                    <div class="course-cont">
                        <div class="modules">
                            <a href="Python_Coursepage.php"><h5>Python</h5></a>
                        </div>
                    </div>
                </div>
                <div class="course-container" id="Aoa">
                    <div class="course-cont">
                        <div class="modules">
                            <a href="AOA_S.php"><h5>Analysis of Algorithm</h5></a>
                        </div>
                    </div>
                </div>
                <div class="course-container" id="os">
                    <div class="course-cont">
                        <div class="modules">
                            <a href="OS_S.php"><h5>Operating System</h5></a>
                        </div>
                    </div>
                </div>
                <div class="course-container" id="dbms">
                    <div class="course-cont">
                        <div class="modules">
                            <a href="DBMS_S.php"><h5>Database Management System</h5></a>
                        </div>
                    </div>
                </div>
                <div class="course-container" id="mp">
                    <div class="course-cont">
                        <div class="modules">
                            <a href="MP_S.php"><h5>Microprocessor</h5></a>
                        </div>
                    </div>
                </div> -->

        <div>

        <!-- <hr> -->

        </div>

        </div>

          </div>

        </div>
    </section>

    <footer>
        <p> &#169; Copyright by IFAK || 2021</p>
    </footer>

    <script src="Course_page.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>