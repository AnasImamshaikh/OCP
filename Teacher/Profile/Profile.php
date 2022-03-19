<?php

    include "../Courses/Teacher/database.php";
    session_start();

    if(isset($_POST['save-change'])){
    $ImageName = $_FILES['profile-img']['name'];
    $Tmp_imageName = $_FILES['profile-img']['tmp_name'];
    $folder_name = 'upload/';
    move_uploaded_file($Tmp_imageName,$folder_name.$ImageName);
    $t_id = $_SESSION['t_id'];
   
    $sql = "UPDATE `teacher` SET `t_image`='$ImageName' WHERE t_id='$t_id' ";
    $result = mysqli_query($conn,$sql);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prociono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="https://img.icons8.com/color/50/000000/student-center.png" type="image/x-icon">
    <link rel="stylesheet" href="Profile.css">
    <title>Profile</title>
</head>
<body>
    

    <navbar>
        <div id="navbar">
            <div>

                <div id="navbar-content">
                    <div id="logo">
                        <img src="../../image/logo.png" alt="">
                    </div>

                    <ul>
                        <li><a href="../Home.php">HOME</a></li>
                        <li><a href="../calendar/calender.php">CALENDER</a></li>
                        <li><a href="#">PROFILE</a></li>
                        <li><a href="../../signIn.php">LOGOUT</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </navbar>

    <hr>

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
                                echo "<img src='upload/{$img}' alt=''>";
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
            <a href="../Courses/Course.php">COURSES</a>
            <a href="../Quiz/Teacher/Quiz_page.php">QUIZ</a>
            <a href="../calendar/calender.php">CALENDAR</a>
            <a href="../Notice/Teacher/Notice_page.php">NOTICE</a>
            <a href="../../signIn.php">LOG OUT</a>
        </div>

        <span onclick="openNav()"><img src="https://img.icons8.com/ios-glyphs/24/000000/menu--v2.png" /></span>

        <div id="main">
            <h4>Dashboard</h4>
        </div>

    </nav>

    <main>
        <div class="Profile-container">
            <div class="Profile-card">
                <div class="Profile-image">
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
                                echo "<img src='upload/{$img}' alt=''>";
                            }
                            
                            
                        }
                        
                    ?>
                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ12nrZzihNnucandf2BnaYVDeg7M04_nCRtA&usqp=CAU" alt=""> -->
                </div>
                <div class="Profile-content">
                    <form action="Profile.php" method="post" enctype="multipart/form-data">
                        <div-cont>
                            <label><b>Name</b></label>
                            <input type="text" placeholder="<?php echo "{$_SESSION['name']}";?>" disabled>
                        </div-cont>
                        <div-cont>
                            <label><b>Email</b></label>
                            <input type="email" placeholder="<?php echo "{$_SESSION['email']}";?>" disabled>
                        </div-cont>
                        <div-cont>
                            <label><b>Phone</b></label>
                            <input type="text" placeholder="<?php echo "{$_SESSION['T_phone']}";?>" disabled>
                        </div-cont>
                        <div-cont>
                            <label><b>Research Interest</b></label>
                            <input type="text" placeholder="<?php echo "{$_SESSION['RI']}";?>" disabled>
                        </div-cont>
                        <div-cont>
                            <label><b>Experience</b></label>
                            <input type="text" placeholder="<?php echo "{$_SESSION['exp']}";?>" disabled>
                        </div-cont>
                        <div-cont>
                            <label><b>Upload Image</b></label>
                            <input type="file" name="profile-img">
                        </div-cont>
                        <div-cont>
                            <input class="btn" type="Submit" value="Save Changes" name="save-change">
                        </div-cont>
                    </form>
                </div>
            </div>
        </div>
    </main>

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