<?php
    include "Courses/Teacher/database.php";
    session_start();
    if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    header("location: signIn.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prociono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="https://img.icons8.com/color/50/000000/student-center.png" type="image/x-icon">
    <title>OnlineCollegePortal</title>
</head>

<body>

    <navbar>
        <div id="navbar">
            <div>

                <div id="navbar-content">
                    <div id="logo">
                        <img src="./image/logo.png" alt="">
                    </div>

                    <ul>
                        <li><a href="../OCP/index.php">HOME</a></li>
                        <li><a href="calendar/example-page.html">CALENDER</a></li>
                        <li><a href="#">PROFILE</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </navbar>

    <hr>

    <nav>

        <div id="my-side-nav" class="Side-nav">
            <div id="side-profile">
                <img src="https://images.unsplash.com/photo-1601807576163-587225545555?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDB8fGVkdWNhdGlvbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="">
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
            <a href="Courses/Course.php">COURSES</a>
            <a href="Quiz/Teacher/Quiz_page.php">QUIZ</a>
            <a href="#CN-section">CALENDAR</a>
            <a href="#CN-section">NOTICE</a>
            <a href="signIn.php">LOG OUT</a>
        </div>

        <span onclick="openNav()"><img src="https://img.icons8.com/ios-glyphs/24/000000/menu--v2.png" /></span>

        <div id="main">
            <h4>Dashboard</h4>
        </div>

    </nav>

    <section>

        <div class="Section-title">
            <h1 class="heading">Courses Overview</h1>
        </div>

        <div class="course-section">


        <?php


        
        $sql = "SELECT * FROM `courses`";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result)){
        echo    "<div class='course-container'>
                <a href='Courses/Teacher/EM_Coursepage.php'>
                    
                    <img src='{$row['C_image']}'
                    alt=''>
                <div class='course-content'>
                    <h2>{$row['C_name']}</h2>
                </div>
                </a>
            </div>";
        }
    ?>

<!-- 
            <div class="course-container">
                <a href="Courses/Teacher/EM_Coursepage.php">
                    <img src="https://lastmomenttuitions.com/wp-content/uploads/2020/01/WhatsApp-Image-2020-06-26-at-12.15.45-PM.jpeg"
                    alt="EM-IV">
                <div class="course-content">
                    <h2>Engineering Mathematics - IV</h2>
                </div>
                </a>
            </div>

            <div class="course-container">
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
            <iframe
                src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23039BE5&amp;ctz=Asia%2FKolkata&amp;src=ZmFoYWQuYS5oYXNtaUBnbWFpbC5jb20&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=cjZvbGt1c3NpOGY0aTE2NGM0MGFubmE2N2tAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZW4uaW5kaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=Y2xhc3Nyb29tMTExMjQzODQzMTk0NjcwOTY1NDU2QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%2333B679&amp;color=%23795548&amp;color=%230B8043&amp;color=%23202124&amp;showTitle=0&amp;showTz=1&amp;showPrint=0"
                style="border:solid 1px #777" width="369" height="300" frameborder="0" scrolling="no">
            </iframe>
        </div>

        <div>
            <div class="Section-title">
                <h1 class="heading">Notice</h1>
            </div>

            <div class="card">
                <ul>
                    <li>Tomorrow is a holiday</li>
                    <li>From next week there will be Term Test</li>
                </ul>
            </div>
        </div>

    </section>

    <hr>

    <footer>
        <p>	&#169; Copyright by IFAK || 2021</p>
    </footer>

    <script>
        function openNav() {
            document.getElementById("my-side-nav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("my-side-nav").style.width = "0";
        }
    </script>

</body>

</html>

