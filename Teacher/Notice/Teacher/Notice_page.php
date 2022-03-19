<?php
   include "database.php";
   include "Notice_upload.php";
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
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
    <link rel="stylesheet" href="../../../Style.css">
    <link rel="stylesheet" href="Notice_page.css">
    <title>OnlineCollegePortal</title>
</head>

<body>

    <navbar>
        <div id="navbar">
            <div>

                <div id="navbar-content">
                    <div id="logo">
                        <img src="../../../image/Notice_page_logo.png" alt="">
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

                            $img = $row['t_image'];
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
            <a href="../../Courses/Course.php">COURSES</a>
            <a href="../../Quiz/Teacher/Quiz_page.php">QUIZ</a>
            <a href="../../calendar/calender.php">CALENDAR</a>
            <a href="#">NOTICE</a>
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
                <!-- <div>
                    <h2>Course => Cyber Security</h2>
                </div> -->
                
                <div class="course-container">
                    <div id="course-cont">
                         <div class="modules">
                            <h5>Notice :</h5>
                         </div> 

                        <div class="form-model">
                             <button class="module-edit w3-button w3-flat-orange w3-large" onclick="document.getElementById('id01').style.display='block'">Add</button>
                             <div class="w3-container">
                          
                                <div id="id01" class="w3-modal">
                                 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                          
                                 <div class="w3-center"><br>
                                  <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                </div>
                          
                                <form class="w3-container" method="POST" action="Notice_page.php" enctype="multipart/form-data">
                                  <div class="w3-section">
                                    <label><b>Date: </b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="date" name="Notice_date" required>
                                    <label><b>Title: </b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Title" name="Notice_Title">
                                    <label><b>Notice: </b></label>
                                    <input class="w3-input w3-border" type="text" placeholder="Enter Notice" name="notice">
                                    <button class="w3-button w3-block w3-flat-orange w3-section w3-padding" type="submit" name="upload">Submit</button>
                                  </div>
                                </form>
                          
                              </div>
                            </div>
                          </div>
                </div>
                </div>

        <div style="margin-right:auto">

        <hr>
                <?php
                    $sql = "SELECT * FROM `notice`";
                    $result = mysqli_query($conn,$sql);

                    while($row = mysqli_fetch_array($result)){
                    echo "<ul><strong>Date : </strong>{$row['notice_date']}
                            <p><strong>Title : </strong>{$row['Notice_title']}</p>
                            <p><strong>Notice : </strong><span>{$row['Notice']}</span></p>
                         </ul>";
                        
                    echo "<hr>";
                    // echo "";
                    // echo "";
                    }
                ?>
        </div>
                  
        </div>

         

          </div>

          
                

            <!-- <div id="card">
                <div>
                    <div id="info">
                        <h2>Course Teacher</h2>
                        <img src="https://eng.rizvi.edu.in/wp-content/uploads/2018/05/PIC_0048-anupam-choudhary.jpg"
                            alt="">
                        <p> <strong>Name :</strong> Anupam Choudhary</p>
                        <p> <strong>Experience :</strong> 19 Years</p>
                        <p> <strong>Email :</strong> anupamchoudhary@eng.rizvi.edu.in</p>
                        <p> <strong>Research Interest :</strong> Compilers, Advanced Networking, Embedded system,
                            Advanced database, AI,
                            ANN, Robotics, Cognitive radios, Image Processing, Digital signal processing,
                            VLSI,Biomedical application developements, Sensor technologies,Biosensors,Nanotechnology.
                        </p>
                    </div>
                </div>
            </div> -->

        </div>
    </section>

    <footer>
        <p> &#169; Copyright by IFAK || 2021</p>
    </footer>

    <script src="Notice_page.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>