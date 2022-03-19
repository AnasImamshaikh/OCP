<?php
    include "../Teacher/Courses/Teacher/database.php";
    session_start();
    if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
        header("Location: http://localhost/OCP/admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dycalendarjs@1.2.1/css/dycalendar.min.css" integrity="sha256-FPzAdciveg2PwCOWcFUzn2MxOHFIiE07p5T9Bz2OXHo=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../Courses/Teacher/Course_page.css">
    <link rel="stylesheet" href="../Style.css">
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prociono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="https://img.icons8.com/color/50/000000/student-center.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>OnlineCollegePortal</title>
    <style>

        #course-add-section{
            display: flex;
            justify-content: space-between;
        }

        #course-add{
            width: max-content;
            box-shadow: none;
            margin: auto;
            position: relative;
            top: 4%;
        }

        #course-cont{
            padding: 0px 5px;
        }

        .Section-title-1{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            min-width: 500px;
            padding: 35px;
        }
        
        #dycalendar{
            width: 100%;
            padding: 20px;
        }

        #dycalendar table{
            width: 100%;
            margin-top: 40px;
        }

        #dycalendar table td{
            padding: 6px;
        }
    </style>
    
</head>

<body>

    <navbar>
        <div id="navbar">
            <div>

                <div id="navbar-content">
                    <div id="logo">
                        <img src="../image/logo.png" alt="">
                    </div>

                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="../calendar/calender.php">CALENDER</a></li>
                        <li><a href="../Teacher/Profile/Profile.php">PROFILE</a></li>
                        <li><a href="../admin_login.php">LOGOUT</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </navbar>

    <!-- <hr> -->

    <nav>

        <div id="my-side-nav" class="Side-nav">
        <div id="side-profile">
            <?php
                        $t_name = $_SESSION['name'];
                        $sql1 = "SELECT `t_image` FROM `teacher` WHERE t_name = '$t_name'";
                        $result = mysqli_query($conn,$sql1);
                        while($row = mysqli_fetch_array($result)){

                            $img = $row['t_image'];
                            if(empty($img)){
                                echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ12nrZzihNnucandf2BnaYVDeg7M04_nCRtA&usqp=CAU' alt=''>";
                            }
                            else{
                                echo "<img src='../Teacher/Profile/upload/{$img}' alt=''>";
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
            <a href="../Teacher/Courses/Course.php">COURSES</a>
            <a href="../Teacher/Quiz/Teacher/Quiz_page.php">QUIZ</a>
            <a href="../Teacher/calendar/calender.php">CALENDAR</a>
            <a href="../Teacher/Notice/Teacher/Notice_page.php">NOTICE</a>
            <a href="../admin_login.php">LOG OUT</a>
        </div>

        <span onclick="openNav()"><img src="https://img.icons8.com/ios-glyphs/24/000000/menu--v2.png" /></span>

        <div id="main">
            <h4>Dashboard</h4>
        </div>

    </nav>

    <!-- <section  id="course-add-section">

    <div class="course-container"  id="course-add">
                    <div id="course-cont">
                        <div class="modules">
                            <h5><b>Courses</b></h5>
                         </div>

                        <div class="form-model">
                             <button class="module-edit w3-button w3-cyan w3-large" onclick="document.getElementById('id01').style.display='block'">Add</button>
                             <div class="w3-container">
                          
                                <div id="id01" class="w3-modal">
                                 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                          
                                 <div class="w3-center"><br>
                                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                </div>
                          
                                <form class="w3-container" method="POST" action="upload.php" enctype="multipart/form-data">
                                  <div class="w3-section">
                                    <label><b>Course Id</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Course Id" name="C_id" required>
                                    <label><b>Course name</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Course Name"    name="Course_name">
                                    <label><b>Course Image</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Course Image Link"    name="Course_img">
                                    <label><b>Teacher Id</b></label>
                                    <input class="w3-input w3-border" type="text" placeholder="Teacher ID" name="t_id">
                                    <button class="w3-button w3-block w3-Blue w3-section w3-padding" type="submit" name="upload">Submit</button>
                                  </div>
                                </form>
                          
                              </div>
                            </div>
                          </div>
                </div>
                </div>

        <div>

    </section> -->

    <section>

        <div class="Section-title-1">
            <h1 class="heading">Add Courses</h1>

            <div class="form-model">
                             <button class="module-edit w3-button w3-cyan w3-large" onclick="document.getElementById('id01').style.display='block'">Add</button>
                             <div class="w3-container">
                          
                                <div id="id01" class="w3-modal">
                                 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                          
                                 <div class="w3-center"><br>
                                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                </div>
                          
                                <form class="w3-container" method="POST" action="upload.php" enctype="multipart/form-data">
                                  <div class="w3-section">
                                    <label><b>Course Id</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Course Id" name="C_id" required>
                                    <label><b>Course name</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Course Name" id="C_name" name="Course_name">
                                    <label><b>Course Image</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Course Image Link" name="Course_img">
                                    <label><b>Teacher Id</b></label>
                                    <input class="w3-input w3-border" type="text" placeholder="Teacher ID" name="t_id">
                                    <button class="w3-button w3-block w3-cyan w3-section w3-padding" id="buttonID" type="submit" name="upload">Submit</button>
                                  </div>
                                </form>
                          
                              </div>
                            </div>
                          </div>
                </div>
                </div>
        </div>

       

        <div class="course-section">

    <?php

        $sql = "SELECT * FROM `courses`";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result)){
        $C_name = $row['C_name'];
        $page = '';
        if($C_name=='AOA'){
            $page = 'Courses_page.php';
        }
        else if($C_name=='Math-4'){
            $page = 'EM_Coursepage.php';
        }

        echo    "<div class='course-container'>
                <a href='Courses/Teacher/{$page}?Course={$C_name}'>
                    
                    <img src='{$row['C_image']}'
                    alt=''>
                <div class='course-content'>
                    <h2>{$row['C_name']}</h2>
                </div>
                </a>
            </div>";
        }
    ?>

             <!--<div class="course-container">
                <a href="Courses/Teacher/Python_Coursepage.php">
                    <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixid=MXwxMjA3fDB8MHxzZWFyY2h8ODN8fHB5dGhvbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="Python">
                <div class="course-content">
                    <h2>Python</h2>
                </div>
                </a>
            </div>

            <div class="course-container">
                <a href="Courses/Teacher/Courses_page.php">
                    <img src="http://aofa.cs.princeton.edu/appiconAofA/AofAicon.png"
                    alt="AOA">
                <div class="course-content">
                    <h2>Analysis of Algorithm</h2>
                </div>
                </a>
            </div>

            <div class="course-container">
                <a href="Courses/Teacher/OS_Coursepage.php">
                    <img src="https://www.ionos.com/digitalguide/fileadmin/DigitalGuide/Teaser/operating-system-t.jpg"
                    alt="OS">
                <div class="course-content">
                    <h2>Operating System</h2>
                </div>
                </a>
            </div>
            <div class="course-container">
                <a href="Courses/Teacher/DBMS_Coursepage.php">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1Afs2XTJmj8kJmWUm2rx7boheiJP9P2Tjqw&usqp=CAU"
                    alt="Microprocessor">
                <div class="course-content">
                    <h2>Database Management System</h2>
                </div>
                </a>
            </div>
            <div class="course-container">
                <a href="Courses/Teacher/MP_Coursepage.php">
                <img src="https://images.unsplash.com/photo-1610878785620-3ab2d3a2ae7b?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NHx8bWljcm9wcm9jZXNzb3J8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="Microprocessor">
                <div class="course-content">
                    <h2>Microprocessor</h2>
                </div></a>
            </div> -->

        </div>

    </section>

    <hr>

    <section id="CN-section">
        <div id="calender-section">
            <div class="Section-title">
                <h1 class="heading">Calender</h1>
            </div>
            <div class="calender-container">
                <div id="dycalendar" style="padding: 20px;"></div>
            </div>
            <!-- <iframe
                src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23039BE5&amp;ctz=Asia%2FKolkata&amp;src=ZmFoYWQuYS5oYXNtaUBnbWFpbC5jb20&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=cjZvbGt1c3NpOGY0aTE2NGM0MGFubmE2N2tAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZW4uaW5kaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=Y2xhc3Nyb29tMTExMjQzODQzMTk0NjcwOTY1NDU2QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%2333B679&amp;color=%23795548&amp;color=%230B8043&amp;color=%23202124&amp;showTitle=0&amp;showTz=1&amp;showPrint=0"
                style="border:solid 1px #777" width="369" height="300" frameborder="0" scrolling="no">
            </iframe> -->
        </div>

        <div>
            <div class="Section-title">
                <h1 class="heading">Notice</h1>
            </div>

            <div class="card">
                <ul>
                <?php
                         $sql = "SELECT * FROM `notice`";
                         $result = mysqli_query($conn,$sql);
     
                         while($row = mysqli_fetch_array($result)){
                         echo "<p><strong>Notice : </strong><span>{$row['Notice']}</span></p>
                                <br>
                              ";
                         }
                ?>
                </ul>
            </div>
        </div>

    </section>

    <hr>

    <footer>
        <p>	&#169; Copyright by IFAK || 2021</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/dycalendarjs@1.2.1/js/dycalendar.min.js" integrity="sha256-VCMmrjRA+GzGwBJKqFPgV1cui7qeTlnw1HCCCQTOGPU=" crossorigin="anonymous"></script>

    <script>
        
        function openNav() {
            document.getElementById("my-side-nav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("my-side-nav").style.width = "0";
        }

        dycalendar.draw({
            target: "#dycalendar",
            type: "month",
            dayformat: "full",
            monthformat: "full",
            highlighttargetdate: true,
            prevnextbutton: 'show'
        });
    </script>

</body>

</html>
