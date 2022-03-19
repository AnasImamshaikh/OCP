 <?php
   include "database.php";
   include "upload.php";
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
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Course_page.css?v=<?php echo time(); ?>">
    <title>OnlineCollegePortal</title>
    <!-- <script>

        function showHint(str) {
        if (str.length == 0) {
            document.getElementById("C_name").innerHTML = "";
            return;
        } 
        else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("C_name").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../../admin/admin_page.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script> -->
</head>

<body>

    <navbar>
        <div id="navbar">
            <div>

                <div id="navbar-content">
                    <div id="logo">
                        <img src="../../../image/Course_Page_Logo.jpg" alt="">
                    </div>

                    <ul>
                        <li><a href="../../Home.php">HOME</a></li>
                        <li><a href="../../calendar/calender.php">CALENDER</a></li>
                        <li><a href="../../Profile/Profile.php">PROFILE</a></li>
                        <li><a href="../../../signIn.php">LOGOUT</a></li>
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
                        $t_name = $_SESSION['name'];
                        $sql1 = "SELECT `t_image` FROM `teacher` WHERE t_name = '$t_name'";
                        $result = mysqli_query($conn,$sql1);
                        $img = '';
                        while($row = mysqli_fetch_array($result)){

                            $_SESSION['img'] = $row['t_image'];
                            $img = $_SESSION['img'];
                            if(empty($img)){
                                echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ12nrZzihNnucandf2BnaYVDeg7M04_nCRtA&usqp=CAU' alt=''>";
                            }
                            else{
                                echo "<img src='../../Profile/upload/{$img}' alt=''>";
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
            <a href="../Course.php">COURSES</a>
            <a href="../../Quiz/Teacher/Quiz_page.php">QUIZ</a>
            <a href="../../calendar/calender.php">CALENDAR</a>
            <a href="../../Notice/Teacher/Notice_page.php">NOTICE</a>
            <a href="../../../signIn.php">LOGOUT</a>
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
                <?php
                    $t_id = $_SESSION['t_id'];
                    $sql = "SELECT C_name FROM courses WHERE EXISTS (SELECT t_id FROM teacher WHERE courses.t_id = teacher.t_id And t_id='$t_id')";

                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){
                        // session_start();
                         $_SESSION['C_name'] = $row['C_name'];
                    }
                    // $C_name = $_SESSION['C_name'];
                    $C_name = $_GET['course'];
                    echo "<h2 id='C_name' onclick='showHint(this.value)'>Course => {$C_name}</h2>";
                ?>
                </div>
                
                <div class="course-container">
                    <div id="course-cont">
                        <div class="modules">
                            <h5>Module 1 : </h5>
                         </div>

                        <div class="form-model">
                             <button class="module-edit w3-button w3-yellow w3-large" onclick="document.getElementById('id01').style.display='block'">Add</button>
                             <div class="w3-container">
                          
                                <div id="id01" class="w3-modal">
                                 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                          
                                 <div class="w3-center"><br>
                                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                </div>
                                <?php
                                    $course = "Courses_page.php?course={$C_name}";
                                 ?>
                                <form class="w3-container" method="POST" action="<?php $course ?>" enctype="multipart/form-data">
                                  <div class="w3-section">
                                    <label><b>Title</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Filename" name="filename" required>
                                    <label><b>Description</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="Other">
                                    <label><b>Upload a File</b></label>
                                    <input class="w3-input w3-border" type="file" placeholder="upload file" name="file">
                                    <button class="w3-button w3-block w3-yellow w3-section w3-padding" type="submit" name="upload">Submit</button>
                                  </div>
                                </form>
                          
                              </div>
                            </div>
                          </div>
                </div>
            </div>

        <div>

        <hr>
                <?php

                //     $sql1 = "SELECT * FROM `courses`";
                //     $result = mysqli_query($conn,$sql1);
                //     while($row = mysqli_fetch_array($result)){
                //             $_SESSION['C_id'] = $row['C_id'];
                //     }

                //   $C_id = $_SESSION['C_id'];
                //   echo $C_id;
                $C_name = $_GET['course'];
            
                    $sql = "SELECT * FROM `course_section` WHERE EXISTS(SELECT C_id FROM courses WHERE courses.C_id = course_section.C_id AND courses.C_name='$C_name')";
                    $result = mysqli_query($conn,$sql);

                    while($row = mysqli_fetch_array($result)){
                    echo "<ul><strong>File Name : </strong>{$row['Title']}
                            <p><strong>{$row['Description']}</strong></p>
                            <a href='D:\Xampp\htdocs\mpexp2.pdf' download><span>{$row['File']}</span></a>
                         </ul>";
                        
                    echo "<hr>";
                    // echo "";
                    // echo "";
                    }
                ?>
        </div>
                  
        </div>

         

          </div>

          
                

            <div id="card">
                <div>
            <?php

                $t_id = $_SESSION['t_id'];

                $sql1 = "SELECT * FROM teacher WHERE EXISTS (SELECT t_id FROM courses WHERE courses.t_id = teacher.t_id AND t_id = '$t_id')";
                $result1 = mysqli_query($conn,$sql1);
                
                // https://yeureka.com/wp-content/uploads/2016/08/default.png
                

                while($row = mysqli_fetch_array($result1)){
                echo   "<div id='info'>
                        <h2>Course Teacher</h2>
                        <img src='../../Profile/upload/{$img}' alt=''>
                        <p> <strong>Name :</strong> {$row['t_name']}</p>
                        <p> <strong>Experience :</strong> {$row['t_exp']}</p>
                        <p> <strong>Email :</strong> {$row['t_email']}</p>
                        <p> <strong>Research Interest :</strong> {$row['t_RI']}</p>
                    </div>";
                }
            ?>
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

<?php

// include "database.php";
$server = 'localhost:3307';
$username = "root";
$password = "";
$database = "OCP";
$conn = mysqli_connect($server,$username,$password,$database);

if(isset($_POST['upload'])){

    $filename = $_POST['filename'];

    $other = $_POST['Other'];

    $pname = $_FILES["file"]["name"];

    $tname = $_FILES["file"]["tmp_name"];

    $upload_dir = realpath(dirname(getcwd()));

    move_uploaded_file($tname,$upload_dir."/".$pname);

    // $sql = "INSERT INTO fileUpload(Title,Other,file) VALUES ('$filename','$other','$pname')";
    // session_start();
    // $t_id = $_SESSION['t_id'];
    // $sql1 = "SELECT C_name FROM courses WHERE EXISTS (SELECT t_id FROM teacher WHERE courses.t_id = teacher.t_id And t_id='$t_id')";

    // $result = mysqli_query($conn,$sql1);
    // while($row = mysqli_fetch_array($result)){
    //     // session_start();
    //      $_SESSION['C_name'] = $row['C_name'];
    // }
    $C_name = $_GET['course'];
    $sql = "INSERT INTO `course_section` (`Title`, `Description`, `File`, `C_id`) VALUES ('$filename', '$other', '$pname', (SELECT C_id FROM courses WHERE C_name = '$C_name'))";

    if(mysqli_query($conn,$sql)){
        // header("Location : http://localhost/OCP/Teacher/Courses/Teacher/Courses_page.php?course={$C_name}");
    }
    else{
        echo "error". mysqli_error($conn);
    }

    
}

?>